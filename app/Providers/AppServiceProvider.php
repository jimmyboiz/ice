<?php

namespace App\Providers;

use App\Models\Access;
use App\View\Composers\NotificationComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            'layouts.header', NotificationComposer::class
        );
        view()->share('adminPY', Access::leftjoin('systems', 'systems.system_id','=', 'accesses.system_id')
                                       ->leftjoin('roles', 'accesses.role_id', 'roles.role_id')
                                       ->where('systems.sub_system', 'Y')
                                       ->where('accesses.role_id', '2')
                                       ->where('accesses.system_id', '46')
                                       ->where('accesses.is_active', 'Y')
                                       ->get());
    }
}
