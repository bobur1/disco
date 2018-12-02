<?php

namespace App\Providers;
use Admin\Policies\ContactsSectionModelPolicy;
use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        //\App\User::class => 'App\Http\Sections\Users',
        'App\Role' => 'App\Http\Sections\Roles',
        'App\User'  => 'App\Http\Sections\Users',
        'App\Models\Purchase'  => 'App\Http\Sections\Purchases',
        'App\Models\Company'  => 'App\Http\Sections\Companies',
        'App\Models\Discount'  => 'App\Http\Sections\Discounts',
        'App\Models\Client'  => 'App\Http\Sections\Clients',
        'App\Models\Discount_List'  => 'App\Http\Sections\Discount_Lists',
    ];

    /**
     * Register sections.
     *
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
    	//
        $this->registerPolicies('Admin\\Policies\\');
        parent::boot($admin);
    }

    
}
