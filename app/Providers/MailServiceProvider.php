<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class MailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        if (Schema::hasTable('mail_configs')) {
            $mail_config = DB::table('mail_configs')->first();
    
            if ($mail_config) {
                Config::set('mail.mailers.smtp.username', $mail_config->username ?? '');
                Config::set('mail.mailers.smtp.password', $mail_config->password ?? '');
            }
        }

        if (Schema::hasTable('site_configs')) {
            $site_config = DB::table('site_configs')->first();
    
            if ($site_config) {
                Config::set('mail.from.address', $site_config->email ?? '');
                Config::set('mail.from.name', $site_config->company_name ?? '');
            }
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
