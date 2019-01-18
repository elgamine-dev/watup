<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');


Artisan::command('campaign', function(){
    $this->comment('Sending lot of mails!');
    $users = \App\User::all();
    $now  = now();
    $week = $now->weekOfYear;
    $year = $now->year;
    foreach($users as $user){
        $feeling = \App\Feeling::firstOrCreate(['user_id'=>$user->id,'week'=>$week, 'year'=>$year]);
         Mail::to($user->email)->send(new \App\Mail\Hey($feeling));
    }
    echo "Done!\n";
})->describe('Send the weekly campaign emails');

Artisan::command('feelings:fake', function() {
    $this->comment('This is sad, but mandatory for testing purposes');

    App\Feeling::all()->each(function($f) {
        $answered = rand(0,10) > 0;
        if($answered) {
            $selected = "f_" . rand(1,5);
            $f->current = $f->{$selected};
            $f->save();
        } 
    });

    $this->comment('This is still sad, but at least, it\'s now over.');
});