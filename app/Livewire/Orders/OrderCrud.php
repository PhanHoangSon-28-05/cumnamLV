<?php

namespace App\Livewire\Orders;

use App\Models\OrderItem;
use App\Repositories\Order\OrderRepositoryInterface;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class OrderCrud extends Component
{
    use WithFileUploads;

    public $action, $modelOrder, $order_id;
    #[Rule('required|string|max:255', message: 'Please provide a order name')]
    public $name;
    #[Rule('required|string|max:255', message: 'Please provide a order description')]
    public $description;

    public $image;
    protected $orderRepos;

    public function boot(OrderRepositoryInterface $orderRepos)
    {
        $this->orderRepos = $orderRepos;
    }

    public function modalSetup($id)
    {

        if ($id == 0) {
            $this->action = 'create';
        } elseif ($id > 0) {
            $this->action = 'update';
        } else {
            $this->action = 'delete';
        }

        $this->modelOrder = OrderItem::find(abs($id));
        $this->order_id = $id;

        if ($this->modelOrder) {
            $this->name = $this->modelOrder->name;
            $this->description = $this->modelOrder->description;
            $this->image = $this->modelOrder->image;
        } else {
            $this->name = '';
            $this->description = '';
            $this->image = '';
        }
    }

    public function create()
    {
        $request = $this->validate();
        $this->orderRepos->createOrder($request, $this->image);

        $this->dispatch('refresh')->to(OrderList::class);
        $this->dispatch('closeCrudOrder');
    }
    public function update()
    {
        $request = $this->validate();

        $this->orderRepos->updateOrder($this->order_id, $request, $this->image);

        $this->dispatch('refresh')->to(OrderList::class);
        $this->dispatch('closeCrudOrder');
    }
    public function delete()
    {
        $this->orderRepos->deleteOrder(abs($this->order_id));

        $this->dispatch('refresh')->to(OrderList::class);
        $this->dispatch('closeCrudOrder');
    }

    public function render()
    {
        if ($this->image) {
            if (gettype($this->image) == 'string') {
                $cover_img = 'storage/' . $this->image;
            } else {
                $cover_img = $this->image->temporaryUrl();
            }
        } else {
            $cover_img = 'images/placeholder/placeholder.png';
        }

        return view('admins.order-item.livewire.order-crud', [
            'cover_img' => $cover_img,
        ]);
    }
}
