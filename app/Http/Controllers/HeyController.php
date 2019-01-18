<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Hey;
use App\Feeling;
use App\User;
use Carbon\Carbon;

class HeyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function browser(User $user) {
        $now = Carbon::now();
        $week = $now->weekOfYear;
        $year = $now->year;
        $feeling = Feeling::firstOrCreate(['user_id'=>$user->id,'week'=>$week, 'year'=>$year]);

        if (!empty($feeling->current)) {
            return abort(400, "Already voted, wanna change vote ?");
        }

        return new Hey($feeling);
    }

    public function vote(Request $request, Feeling $feeling, $vote) {
        
        $feeling->current = $vote;
        $feeling->save();

        return "Thanks!";
    }
}
