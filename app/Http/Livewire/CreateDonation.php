<?php

namespace App\Http\Livewire;

use App\Models\Donation;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CreateDonation extends Component
{
    public $open = false;

    public $nombre, $monto, $descripcion;

    protected $rules = [
        'nombre' => 'required|max:50',
        'monto' => 'required|numeric',
        'descripcion' => 'required|max:150',
    ];

    public function save(){
        $this->validate();
        if(is_null($this->user_id)){
            $this->user_id = Auth::user()->id;
        }

        Donation::create([
            'nombre' => $this->nombre,
            'monto' => $this->monto,
            'descripcion' => $this->descripcion,
        ]);
        $this->reset(['open', 'nombre', 'monto', 'descripcion']);
        $this->emitTo('show-donations','render');
        $this->emit('alert', 'La donación se creo satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.create-donation');
    }
}
