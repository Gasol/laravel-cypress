<?php

namespace Laracasts\Cypress\Tests;

use Illuminate\Support\Facades\Route;
use Laracasts\Cypress\CypressServiceProvider;
use Orchestra\Testbench\TestCase;

class CypressTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [CypressServiceProvider::class];
    }

    /**
     * @test
     */
    public function it_exposes_cypress_routes_if_not_in_production()
    {
        $this->routeNames()->each(function ($name) {
            $this->assertTrue(Route::has($name));
        });
    }

    protected function routeNames()
    {
        return collect([
            'cypress.factory',
            'cypress.login',
            'cypress.logout',
            'cypress.artisan',
            'cypress.run-php',
            'cypress.csrf-token',
            'cypress.routes',
            'cypress.current-user'
        ]);
    }
}
