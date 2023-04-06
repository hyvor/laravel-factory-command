<?php

namespace Hyvor\LaravelFactoryCommand\Tests;

use Hyvor\LaravelFactoryCommand\FactoryCommandServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class TestCase extends \Orchestra\Testbench\TestCase
{


    protected function setUp(): void
    {
        parent::setUp();


        DB::statement('DROP TABLE IF EXISTS users');

        DB::statement('CREATE TABLE users (
            id INTEGER PRIMARY KEY, 
            created_at TIMESTAMP,
            updated_at TIMESTAMP,
            name TEXT, 
            email TEXT)
        ');
    }

    protected function getPackageProviders($app)
    {
        return [
            FactoryCommandServiceProvider::class,
        ];
    }

}