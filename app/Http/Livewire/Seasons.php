<?php

namespace App\Http\Livewire;

use App\Models\Season;
use Livewire\Component;

class Seasons extends Component
{
    public $season;
    public $seasons = [];

    public function mount(Season $season)
    {
        $this->seasons = Season::get();
        $this->season = $season;
    }

    public function render()
    {
        return view('livewire.seasons');
    }

    public function editSeason($index){
        $season= Season::find($index);
        $this->season = $season;
    }

    public function removeSeason($index){
        $season= Season::find($index);
        $season->delete();
        session()->flash('message', 'تم الحذف بنجاح');
        return redirect()->route('season.index');
    }

    public function saveSeason(){
        $this->validate();
        $this->season->status = $this->season->status ? 1 : 0;
        $this->season->save();
        session()->flash('message', 'تم الحفظ بنجاح');
        return redirect()->route('season.index');
    }

    public function rules(): array {
        return [
            'season.name' =>'required|unique:seasons,name,'.$this->season->id.'|max:255',
            'season.status' =>''
        ];
    }

    public function messages(): array {
        return [
            'season.name.required' =>'اسم الموسم مطلوب',
            'season.name.unique' =>'هذا الاسم موجود بالفعل',
            'season.name.max' =>'يجب الا يزيد طول الاسم عن 255 حرف',
            'season.status' =>''
        ];
    }
}
