<?php

namespace App\Http\Livewire;

use App\Models\Chalet;
use App\Models\Season;
use Livewire\Component;

class Prices extends Component
{
    public $TYPES;
    public $SIZES;

    public $chalet;
    public $chaletSeasons = [];
    public $seasons = [];
    public $seasons_list = [];

    public function mount(Chalet $chalet)
    {

        $this->TYPES = Chalet::TYPES;
        $this->SIZES = Chalet::SIZES;
        $this->seasons = $this->seasons_list = Season::pluck('name', 'id');
        $this->chalet = $chalet;
        if($this->chalet){
            foreach ($this->chalet->seasons as $season) {
                $this->chaletSeasons[] = [
                    'price_id' => $season->pivot->id,
                    'price' => $season->pivot->price,
                    'chalet_id' => $season->pivot->chalet_id,
                    'season_id' => $season->pivot->season_id,
                    'is_saved' => true,
                ];

            }
        }
    }

    public function render()
    {
        return view('livewire.prices');
    }
    public function addSeason(){
        foreach ($this->chaletSeasons as $key => $chalet_season) {
            if (isset($chalet_season['is_saved']) && !$chalet_season['is_saved']) {
                $this->addError('chaletSeasons.'.$key,'يجب حفظ هذا السعر أولا');
                return;
            }
        }
        $this->chaletSeasons[] = [
            'price' => 0,
            'chalet_id' => $this->chalet->id??'',
            'season_id' => array_key_first($this->seasons->toArray()),
            'is_saved' => false,
        ];
    }

    public function editSeason($index){
        foreach ($this->chaletSeasons as $chalet_season) {
            if (!$chalet_season['is_saved']) {
                $this->addError('chaletSeasons.'.$index, 'يجب حفظ هذا السعر أولا');
                return;
            }
        }

        $this->seasons[$this->chaletSeasons[$index]['season_id']] = $this->seasons_list[$this->chaletSeasons[$index]['season_id']];
        $this->chaletSeasons[$index]['is_saved'] = false;
    }


    public function saveSeason($index){
        $this->resetErrorBag();
        $this->chaletSeasons[$index]['is_saved'] = true;
        unset($this->seasons[$this->chaletSeasons[$index]['season_id']]);
    }

    public function removeSeason($index){
        $this->seasons[$this->chaletSeasons[$index]['season_id']] = $this->seasons_list[$this->chaletSeasons[$index]['season_id']];
        unset($this->chaletSeasons[$index]);
        $this->chaletSeasons = array_values($this->chaletSeasons);
    }


    public function saveChaletSeasons(){
        $this->validate();
        $this->chalet->size = $this->chalet->size ? $this->chalet->size : 1;
        $this->chalet->type = $this->chalet->type ? $this->chalet->type : 1;
        $this->chalet->external_session = $this->chalet->external_session ? 1 : 0;
        $this->chalet->pool = $this->chalet->pool ? 1 : 0;
        $this->chalet->save();
        $chaletSeasons = [];

        foreach ($this->chaletSeasons as $chalet_season) {
            $chaletSeasons[$chalet_season['season_id']] = [
                'price' => $chalet_season['price'],
                'season_id' => $chalet_season['season_id']
            ];
        }

        $this->chalet->seasons()->sync($chaletSeasons);
        session()->flash('message', 'تم الحفظ بنجاح');
        return redirect()->route('chalet.edit', $this->chalet->id);
    }

    public function rules(): array {
        return [
            'chalet.name' =>'required|unique:chalets,name,'.$this->chalet->id.'|max:255',
            'chalet.size' =>'',
            'chalet.type' =>'',
            'chalet.external_session' =>'',
            'chalet.contact' =>'digits:10',
            'chalet.pool' =>'',
        ];
    }

}
