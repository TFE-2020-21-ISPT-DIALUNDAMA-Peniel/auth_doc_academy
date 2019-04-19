<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Models\Document;

class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /**
        * Vérifie si le code d'accès existe à la BD
         *
         * @return bolean
         */
        Validator::extend('codeExist', function ($attribute, $value, $parameters, $validator) {
            $code = Document::where('code',$value)->first();
            if ($code) {
             return true;
            }
            return false;
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
