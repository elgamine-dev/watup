<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Feeling;
use App\User;
use App\Option;
use App\Formatters\Mood;
use Carbon\Carbon;

class HomeController extends Controller {
    public function __construct() {
        $this->middleware('auth', ['except'=> ['sendSignInLink', 'autologin', 'users']]);
    }

    public function index() {
        return view('home');
    }

    public function users() {
        return view('users');
    }

    public function feelings(Request $request) {
        $week = $request->input('week', now()->weekOfYear);
        $year = $request->input('year', now()->year);

        $feelings = Feeling::where(['week'=>$week, 'year'=>$year])->get();
        $mood = Mood::get($feelings);
        $date = Carbon::now();
        $date->setISODate($year,$week);
        $prevDate = $date->copy()->subWeek();
        $nextDate = $date->copy()->addWeek();
        $previous = (object) [
            'label'=>"< week ".$prevDate->weekOfYear, 
            'link'=>route('feelings', ["week"=>$prevDate->weekOfYear, "year"=>$prevDate->yearIso])
        ];
        $next = (object) [
            'label'=>"week ".$nextDate->weekOfYear . " >", 
            'link'=>route('feelings', ["week"=>$nextDate->weekOfYear, "year"=>$nextDate->yearIso])
        ];
        return view('feelings', compact('feelings', 'mood', 'previous', 'next'));
    }
    public function options() {
        return view('options.index', ['options'=>Option::all()]);
    }

    public function profile(User $user) {
        if (Gate::denies('profile', $user)) {
            return abort(500);
        }
        $mood = Mood::get($user->feelings);
        return view('profile', compact('user', 'mood'));
    }

    
}
