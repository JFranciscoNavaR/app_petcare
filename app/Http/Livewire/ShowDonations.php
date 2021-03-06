<?php

namespace App\Http\Livewire;

use App\Models\Donation;
use Livewire\Component;
use Livewire\WithPagination;

class ShowDonations extends Component
{
    use WithPagination;
    public $donation;
    public $titulo;
    public $search = '';
    public $sort = 'id';
    public $direction = 'asc';
    public $cantidad = '5';
    public $readyToLoad = false;

    public $open_edit = false;

    protected $listeners = ['render', 'delete'];

    protected $queryString = [
        'cantidad' => ['except' => '5'],
        'sort' => ['except' => 'id'], 
        'direction' => ['except' => 'asc'],
        'search' => ['except' => ''],
    ];

    public function mount(){
        $this->donation = new Donation();
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    protected $rules = [
        'donation.nombre' => 'required|max:50',
        'donation.monto' => 'required|numeric',
        'donation.descripcion' => 'required|max:150',
    ];

    public function render()
    {
        $this->titulo = "Ver Donaciones";
        if($this->readyToLoad == true){
            $donations = Donation::where('id', 'like', '%' . $this->search . '%')
            ->orwhere('nombre', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cantidad);

        }else{
            $donations = [];
        }
        return view('livewire.show-donations', compact('donations'));
    }

    public function loadDonations(){
        $this->readyToLoad = true;
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'asc') {
                $this->direction = 'desc';
            } else {
                $this->direction = 'asc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function edit(Donation $donation){
        $this->donation = $donation;
        $this->open_edit = true;
    }

    public function update(){
        $this->validate();
        $this->donation->save();
        $this->reset(['open_edit']);
        $this->emit('alert', 'La donaci??n se actualizo satisfactoriamente');
    }

    public function delete(Donation $donation){
        $donation->delete();
    }
}
