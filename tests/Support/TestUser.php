<?php

namespace Laracasts\Cypress\Tests\Support;

use Illuminate\Foundation\Auth\User as Authenticatable;

class TestUser extends Authenticatable
{
    protected $table = 'users';
    protected $hidden = ['plan'];

    protected static function boot()
    {
        parent::boot();
        static::booted();
    }

    protected static function booted()
    {
        static::created(function ($user) {
            $user->profile()->create(['location' => 'USA']);
        });
    }

    public function profile()
    {
        return $this->hasOne(TestProfile::class, 'user_id');
    }
}
