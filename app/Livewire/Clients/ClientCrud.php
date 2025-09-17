<?php

namespace App\Livewire\Clients;

use App\Models\ClientTestimonials;
use App\Repositories\Client\ClientRepositoryInterface;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ClientCrud extends Component
{
    use WithFileUploads;
    public $action,
        $client,
        $pic,
        $pic2,
        $link;

    #[Validate('required', message: 'No order number has been entered')]
    public $stt;

    public $title, $description;
    protected $clientRepo;

    public function modalSetup($id)
    {
        if ($id == 0) {
            $this->action = 'create';
        } elseif ($id > 0) {
            $this->action = 'update';
        } else {
            $this->action = 'delete';
        }
        // dd($id);
        $this->client = ClientTestimonials::find(abs($id));
        // dd($this->client);
        $this->getData();
    }


    public function getData()
    {
        // dd($this->client);
        if ($this->client) {
            $this->stt = $this->client->stt;
            $this->pic = $this->client->pic;
            $this->pic2 = $this->client->pic2;
            $this->title = $this->client->title;
            $this->description = $this->client->description;
            $this->link = $this->client->link;
        } else {
            $this->stt = '';
            $this->pic = '';
            $this->pic2 = '';
            $this->title = '';
            $this->description = '';
            $this->link = '';
        }

        $this->resetErrorBag();
    }

    public function boot(ClientRepositoryInterface $clientRepo)
    {
        $this->clientRepo = $clientRepo;
    }

    public function create()
    {
        $this->validate();
        $client = $this->clientRepo->createClient($this->stt, $this->title, $this->description, $this->pic, $this->pic2, $this->link);

        $this->dispatch('refreshList')->to('clients.client-list');
        $this->dispatch('closeCrudClient');
    }

    public function update()
    {
        $this->validate();

        $this->clientRepo->updateClient($this->client, $this->stt, $this->title, $this->description, $this->pic, $this->pic2, $this->link);

        $this->dispatch('refreshList')->to('clients.client-list');
        $this->dispatch('closeCrudClient');
    }

    public function delete()
    {
        $this->clientRepo->deleteClient($this->client);

        $this->dispatch('refreshList')->to('clients.client-list');
        $this->dispatch('closeCrudClient');
    }
    public function render()
    {
        if ($this->pic) {
            if (gettype($this->pic) == 'string') {
                $cover_img = route('storages.image', ['url' => $this->pic]);
            } else {
                $cover_img = $this->pic->temporaryUrl();
            }
        } else {
            $cover_img = 'images/placeholder/placeholder.png';
        }

        if ($this->pic2) {
            if (gettype($this->pic2) == 'string') {
                $cover_img2 = route('storages.image', ['url' => $this->pic2]);
            } else {
                $cover_img2 = $this->pic2->temporaryUrl();
            }
        } else {
            $cover_img2 = 'images/placeholder/placeholder.png';
        }

        return view('admins.client.livewire.client-crud', [
            'cover_img' => $cover_img,
            'cover_img2' => $cover_img2,
        ]);
    }
}
