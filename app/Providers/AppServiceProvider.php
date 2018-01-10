<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
      $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            // $event->menu->add([
            //   'text' => 'Blog Post',
            //   'can' => 'blog_manage',
            //   'icon' => 'globe',
            //   'submenu' => [
            //     [
            //       'text' => 'Blog',
            //       'url' => 'blog',
            //       'can' => 'blog_manage',
            //     ]
            //   ]
            // ]);
            $event->menu->add([
              'text' => 'Administration',
              'icon' => 'cogs',
              'can' => 'users_manage',
              'submenu' => [
                [
                  'text' => 'Manage Users',
                  'icon' => 'users',
                  'can' => 'users_manage',
                  'submenu' => [
                    [
                        'icon' => 'lock',
                        'text' => 'Permissions',
                        'url' => 'admin/permissions',
                        'can' => 'users_manage',
                    ],
                    [
                        'icon' => 'briefcase',
                        'text' => 'Roles',
                        'url' => 'admin/roles',
                        'can' => 'users_manage',
                    ],
                    [
                        'icon' => 'user',
                        'text' => 'Users',
                        'url' => 'admin/users',
                        'can' => 'users_manage',
                    ],
                  ],
                ],
                // [
                //   'text' => 'Reference',
                //   'icon' => 'info-circle'
                // ],
                // [
                //   'text' => 'Configuration',
                //   'icon' => 'cog'
                // ],

              ]
            ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
