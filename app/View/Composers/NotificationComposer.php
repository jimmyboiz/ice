<?php
 
namespace App\View\Composers;


use App\Models\Access;
use App\Models\Item;
use App\Models\Role;
use App\Models\System;
use Carbon\Carbon;
// use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\Request;

 
class NotificationComposer
{
    /**
     * The user repository implementation.
     *
     * @var \App\Repositories\UserRepository
     */
    protected $users;
 
    /**
     * Create a new profile composer.
     *
     * @param  \App\Repositories\UserRepository  $users
     * @return void
     */
    // public function __construct(UserRepository $users)
    // {
    //     $this->users = $users;
    // }
 
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $todays = Item::where('expiry_date','=', Carbon::today())->orderBy('expiry_date')->get();
        $cores = Access::leftjoin('systems', 'systems.system_id','=', 'accesses.system_id')
                       ->where('emp_id', Auth()->user()->emp_id)
                       ->where('systems.sub_system', 'N')
                       ->get();
        $accesses = Access::leftjoin('systems', 'systems.system_id','=', 'accesses.system_id')
                          ->leftjoin('roles', 'accesses.role_id', 'roles.role_id')
                          ->where('emp_id', Auth()->user()->emp_id)
                          ->where('systems.sub_system', 'Y')
                          ->get();
        
        $adminPY = Access::leftjoin('systems', 'systems.system_id','=', 'accesses.system_id')
                        ->where('systems.sub_system', 'Y')
                        ->where('accesses.role_id', '2')
                        ->where('accesses.system_id', '46')
                        ->where('emp_id', Auth()->user()->emp_id)
                        ->where('accesses.is_active', 'Y')
                        ->first();
        // $systems = System::get();

        $pyline = System::where('system_id','46')->first();
        $bcms = System::where('system_id','43')->first();
        $mis = System::where('system_id','45')->first();
        $rms = System::where('system_id', '34')->first();
        // $adminPY = Role::where('role_id', '2')->first();
        $view->with('todays', $todays)
             ->with('cores', $cores)
             ->with('accesses', $accesses)
            //  ->with('systems', $systems)
             ->with('pyline', $pyline)
             ->with('bcms', $bcms)
             ->with('mis', $mis)
             ->with('rms', $rms)
             ->with('adminPY', $adminPY);
    }
}