<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Feeling;
use Uuid;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public $incrementing = false;
    public $keyType = "string";

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function boot () {
        parent::boot();

        static::creating(function($model) {
            $model->id = Uuid::generate();
            return $model;
        });
    }

    public function feelings() {
        return $this->hasMany(Feeling::class);
    }

    public function isAdmin() {
        return $this->is_admin;
    }
}
