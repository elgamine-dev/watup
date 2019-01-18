<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\URL;
use Uuid;

class Feeling extends Model
{
    public $incrementing = false;
    public $keyType = "string";

    protected $fillable = [
        'week', 'year', 'user_id',
    ];

    public static function boot () {
        parent::boot();

        static::creating(function($model) {
            $model->id = Uuid::generate();
            $model->f_1 = Uuid::generate();
            $model->f_2 = Uuid::generate();
            $model->f_3 = Uuid::generate();
            $model->f_4 = Uuid::generate();
            $model->f_5 = Uuid::generate();
            
            return $model;
        });
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getMoodAttribute() {
        if ($this->f_1 === $this->current) {
            return "😖";
        }
        if ($this->f_2 === $this->current) {
            return "☹️";
        }
        if ($this->f_3 === $this->current) {
            return "😶";
        }
        if ($this->f_4 === $this->current) {
            return "🙂";
        }
        if ($this->f_5 === $this->current) {
            return "🤗";
        }
        return "?";
    }

    public function getNoteAttribute() {
        if ($this->f_1 === $this->current) {
            return 1;
        }
        if ($this->f_2 === $this->current) {
            return 2;
        }
        if ($this->f_3 === $this->current) {
            return 3;
        }
        if ($this->f_4 === $this->current) {
            return 4;
        }
        if ($this->f_5 === $this->current) {
            return 5;
        }
        return null;
    }

    public function makeLink($pos) {
        return URL::temporarySignedRoute(
            'autologin', now()->addDays(3), [
                'user_id' => $this->user->id,
                'url_redirect' => route("hey", [
                    'feeling'=>$this->id,
                    'vote'=>$this->{"f_".$pos}
                ])
            ]
        );
    }
}
