<?php

namespace Pkboom\TinkerOnVscode;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class TinkerOnVscodeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ExecuteCodeCommand::class,
                TinkerOnVscodeCommand::class,
            ]);
        }
    }

    public function register()
    {
        Config::set('telescope.enabled', false);

        $this->mergeConfigFrom(__DIR__.'/../config/tinker-on-vscode.php', 'tinker-on-vscode');
    }
}
