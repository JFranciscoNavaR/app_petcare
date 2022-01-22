<?php

namespace App\Http\Livewire;

use App\Models\Donation;
use Exception;
use Livewire\Component;

class DonationPay extends Component
{
    public $donation;
    protected $listeners = ['paymentMethodCreate'];

    public function mount(Donation $donation){
        $this->donation = $donation;
    }

    public function render()
    {
        return view('livewire.donation-pay');
    }

    public function paymentMethodCreate($paymentMethod){
        try{
            auth()->user()->charge($this->donation->monto * 100, $paymentMethod);
            $this->emit('resetStripe');
            return redirect()->route('showdonationsuser');
        }catch(Exception $e){
            $this->emit('errorPayment');
        }
    }
}
