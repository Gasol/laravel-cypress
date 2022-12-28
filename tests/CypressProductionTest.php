<?php

namespace Laracasts\Cypress\Tests;

use Illuminate\Support\Facades\Route;
use Laracasts\Cypress\CypressServiceProvider;
use Orchestra\Testbench\TestCase;

class CypressProductionTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [CypressServiceProvider::class];
    }

    /**
     * @test
     */
    public function it_does_not_expose_cypress_routes_in_production()
    {
        $this->app = $this->createApplication();
        $this->routeNames()->each(function ($name) {
            $this->assertFalse(Route::has($name));
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

    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);
        $app->detectEnvironment(function () {
            return 'production';
        });
    }
}
