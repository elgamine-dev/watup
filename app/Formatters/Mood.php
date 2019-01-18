<?php 
namespace App\Formatters;

use Illuminate\Support\Collection;
use App\Feeling;

class Mood {
    public static function get(Collection $feelings) {
        $mood = $feelings->map(function($feeling) {
            return $feeling->note;
        });
        $values = [];
        foreach($mood as $m) {
            if (!isset($values[$m])) {
                $values[$m] = 0;
            }
            $values[$m]++;
        }

        

        return collect($values)->sortKeys()->map(function($v, $k) {
            if($k === "") { return (object) ["key"=>"?", "value"=>$v];}
            $f = new Feeling;
            $f->{"f_".$k} = 1;
            $f->current = 1;
            
            return (object) ["key"=>$f->mood, "value"=>$v];
        })->reverse();
        
    }
}