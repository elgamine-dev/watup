@extends('layouts.nes')

@section('content')
    @foreach(App\User::all()  as $user)
        <li><a href="{{route('profile', $user->id)}}">{{$user->name}}</a> 
        {{$user->email}}
        <input type="text" value="{{$user->id}}"></li>
    @endforeach
@endsection