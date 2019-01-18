@extends('layouts.nes')

@section('content')
    <div class="nes-container feelings">
        @foreach($mood as $m)
            <div>
                {{$m->key}} {{$m->value}}
            </div>
        @endforeach
    </div>
    
    <table class="nes-table is-bordered">
    <thead>
        <tr>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>feeler</th>

        </tr>
    </thead>
    @foreach($user->feelings  as $f)
        <tr>
            <td>'{{substr($f->year,2)}} w {{$f->week}}</td>
            <td>
               {{$f->mood}}
            </td>
            <td>{{$f->user->name}}</td>
        </tr>
    @endforeach
    </table>
@endsection