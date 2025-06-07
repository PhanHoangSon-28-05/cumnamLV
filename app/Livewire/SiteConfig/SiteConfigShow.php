<?php

namespace App\Livewire\SiteConfig;

use Livewire\Component;
use App\Models\SiteConfig;
use Illuminate\Support\Facades\DB;

class SiteConfigShow extends Component
{
    public $company_name;
    public $email;
    public $phone;
    public $address;
    public $copyright;
    public $instagram;
    public $facebook;
    public $pinterest;
    public $promotion;
    public $state_tax;
    public $city_tax;

    public function mount()
    {
        $this->getData();
    }

    public function getData()
    {
        $config = DB::table('site_configs')->first();
        
        $this->company_name = $config->company_name ?? '';
        $this->email = $config->email ?? '';
        $this->phone = $config->phone ?? '';
        $this->address = $config->address ?? '';
        $this->copyright = $config->copyright ?? '';
        $this->instagram = $config->instagram ?? '';
        $this->facebook = $config->facebook ?? '';
        $this->pinterest = $config->pinterest ?? '';
        $this->promotion = $config->promotion ?? 0;
        $this->state_tax = $config->state_tax ?? 0;
        $this->city_tax = $config->city_tax ?? 0;
    }

    public function update()
    {
        $config = DB::table('site_configs')->first();

        $params = [
            'company_name' => $this->company_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'copyright' => $this->copyright,
            'instagram' => $this->instagram,
            'facebook' => $this->facebook,
            'pinterest' => $this->pinterest,
            'promotion' => $this->promotion,
            'state_tax' => $this->state_tax,
            'city_tax' => $this->city_tax,
        ];

        if ($config) {
            $config->update($params);
        } else {
            DB::table('site_configs')->insert($params);
        }

        request()->session()->flash('success', 'Config Update Successfully');
    }

    public function render()
    {
        return view('admins.site-config.livewire.site-config-show');
    }
}
