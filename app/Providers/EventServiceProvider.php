<?php
namespace App\Providers;

use App\Listeners\MergeCartListener;
use Illuminate\Auth\Events\login;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Login::class => [
            MergeCartListener::class,
        ],
    ];
}
