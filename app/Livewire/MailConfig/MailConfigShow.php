<?php

namespace App\Livewire\MailConfig;

use Livewire\Component;
use App\Models\MailConfig;
use Illuminate\Support\Facades\DB;

class MailConfigShow extends Component
{
    public $username;
    public $password;
    public $from_address;
    public $from_name;

    public function mount()
    {
        $this->getData();
    }

    public function getData()
    {
        $config = DB::table('mail_configs')->first();
        
        $this->username = $config->username ?? '';
        $this->password = $config->password ?? '';
        $this->from_address = $config->from_address ?? '';
        $this->from_name = $config->from_name ?? '';
    }

    public function update()
    {
        $config = DB::table('mail_configs')->first();

        $params = [
            'username' => $this->username,
            'password' => $this->password,
            'from_address' => $this->from_address,
            'from_name' => $this->from_name,
        ];

        if ($config) {
            $config->update($params);
        } else {
            DB::table('mail_configs')->insert($params);
        }

        request()->session()->flash('success', 'Config Update Successfully');
        $this->dispatch('$refresh')->to('mail-config.mail-config-show');
    }

    public function render()
    {
        return view('admins.mail-config.livewire.mail-config-show');
    }
}
