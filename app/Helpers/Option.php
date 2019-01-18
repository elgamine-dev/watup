<?php 
namespace App\Helpers;

class Option {
    public static function get($key) {
        return \App\Option::whereKey($key)->first();
    }
}