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
    public $chaletPrices = [];
    public $seasons = [];
    public $seasons_list = [];

    public function mount(Chalet $chalet)
    {
        $this->TYPES = Chalet::TYPES;
        $this->SIZES = Chalet::SIZES;
        $this->seasons = $this->seasons_list = Season::pluck('name', 'id');
        $this->chalet = $chalet;
        if($this->chalet){
            foreach ($this->chalet->prices as $price) {
                $this->chaletPrices[] = [
                    'price_id' => $price->id,
                    'price' => $price->price,
                    'chalet_id' => $price->chalet_id,
                    'season_id' => $price->season_id,
                    'is_saved' => true,
                ];
            }
        }
    }

    public function render()
    {
        return view('livewire.prices');
    }
    public function addPrice(){
        foreach ($this->chaletPrices as $chalet_price) {
            if (isset($chalet_price['is_saved']) && !$chalet_price['is_saved']) {
                $this->addError('يجب حفظ هذا السعر أولا');
                return;
            }
        }
        $this->chaletPrices[] = [
            'price' => 0,
            'chalet_id' => $this->chalet->id??'',
            'season_id' => array_key_first($this->seasons->toArray()),
            'is_saved' => false,
        ];
    }

    public function editPrice($index){
        foreach ($this->chaletPrices as $chalet_price) {
            if (!$chalet_price['is_saved']) {
                $this->addError('يجب حفظ هذا السعر أولا');
                return;
            }
        }

        $this->seasons[$this->chaletPrices[$index]['season_id']] = $this->seasons_list[$this->chaletPrices[$index]['season_id']];
        $this->chaletPrices[$index]['is_saved'] = false;
    }


    public function savePrice($index){
        $this->resetErrorBag();
        $this->chaletPrices[$index]['is_saved'] = true;
        unset($this->seasons[$this->chaletPrices[$index]['season_id']]);
        //dd($this->seasons);
    }

    public function removePrice($index){
        $this->seasons[$this->chaletPrices[$index]['season_id']] = $this->seasons_list[$this->chaletPrices[$index]['season_id']];
        unset($this->chaletPrices[$index]);
        $this->chaletPrices = array_values($this->chaletPrices);
    }


    public function saveChaletPrices(){
        $this->validate();
        $this->chalet->save();
        $chaletPrices = [];

        foreach ($this->chaletPrices as $chalet_price) {
            $chaletPrices[$chalet_price['id']] = [
                'price' => $chalet_price['price'],
                'season_id' => $chalet_price['prseason_idice'],
                'chalet_id' => $chalet_price['chalet_id']
            ];
        }

        $this->chalet->prices()->sync($chaletPrices);

        return redirect()->route('chalet.index');
    }

    public function rules(): array {
        return [
            'name' =>'required'
        ];
    }

}
