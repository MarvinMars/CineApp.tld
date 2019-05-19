<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $data = collect([
            'social' => collect([
              [
                  'id' => '1',
                  'icon' => 'fab fa-twitter',
                  'name' => 'Twitter',
                  'link' => '#'
              ],
              [
                  'id' => '2',
                  'icon' => 'fab fa-dribbble',
                  'name' => 'Dribbble',
                  'link' => '#'
              ],
              [
                  'id' => '3',
                  'icon' => 'fab fa-facebook-square',
                  'name' => 'Facebook',
                  'link' => '#'
              ]
            ]),
            'categories' => collect([
                [
                    'id' => '1',
                    'icon' => 'fab fa-twitter',
                    'name' => 'Twitter',
                    'link' => '#'
                ],
                [
                    'id' => '2',
                    'icon' => 'fab fa-dribbble',
                    'name' => 'Dribbble',
                    'link' => '#'
                ],
                [
                    'id' => '3',
                    'icon' => 'fab fa-facebook-square',
                    'name' => 'Facebook',
                    'link' => '#'
                ],
                [
                    'id' => '4',
                    'icon' => 'fab fa-twitter',
                    'name' => 'Twitter',
                    'link' => '#'
                ],
                [
                    'id' => '5',
                    'icon' => 'fab fa-dribbble',
                    'name' => 'Dribbble',
                    'link' => '#'
                ],
                [
                    'id' => '6',
                    'icon' => 'fab fa-facebook-square',
                    'name' => 'Facebook',
                    'link' => '#'
                ]
            ])
        ]);

        view()->share('data', $data);
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
