<?php

namespace Hyvor\LaravelFactoryCommand\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected static function newFactory() : Factory
    {
        return new UserFactory();
    }

}