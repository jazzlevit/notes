<?php

namespace Jazzlevit\Notes;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class EductoNotesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Route::prefix('notes')
            ->middleware('web')
            ->as('notes.')
            ->group(function () {
                $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
            });

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'notes');
    }
}
