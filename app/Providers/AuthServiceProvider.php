<?php

namespace App\Providers;

// -*- Add as GateContract
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('isAdmin', function($user){
            return $user->user_type == 'admin';
        });
    

        $gate->define('isServidor', function($user){
            return $user->user_type == 'servidor';
        });

        $gate->define('isInterprete', function($user){
            return $user->user_type == 'interprete';
        });

        $gate->define('isGestordepartemento', function ($user) {
            return $user->user_type == 'gestor_dpto';
        });

        $gate->define('isAudiovisual', function ($user) {
            return $user->user_type == 'audio_visual';
        });

        // $gate->define('isUser', function ($user) {
        //     return $user->user_type == 'user';
        // });

    }
}
