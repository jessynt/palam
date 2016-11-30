<?php

namespace App\Providers\PluginProviders;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;


class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * 中国大陆手机号码验证
         */
        Validator::extend('zh_mobile', function ($attribute, $value) {
            return preg_match('/^(\+?0?86\-?)?((13\d|14[57]|15[^4,\D]|17[678]|18\d)\d{8}|170[059]\d{7})$/', $value);
        });
    }
}
