<?php

namespace App\Livewire\Clients;

use App\Models\ClientTestimonials;
use Livewire\Component;

class ClientList extends Component
{
    protected $listeners = [
        'refreshList' => '$refresh'
    ];

    public function render()
    {
        $clients = ClientTestimonials::orderBy('stt', 'ASC')->get();
        return view('admins.client.livewire.client-list', ["clients" => $clients]);
    }   
}
