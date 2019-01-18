@extends('layouts.nes')

@section('content')
    <menu>
        <a href="{{$previous->link}}" class="nes-btn">{{$previous->label}}</a>
        <a href="{{$next->link}}" class="nes-btn">{{$next->label}}</a>
    </menu>
    <div class="nes-container feelings">
        @foreach($mood as $m)
            <div>
                {{$m->key}} {{$m->value}}
            </div>
        @endforeach
    </div>
    
    @admin
    <table class="nes-table is-bordered">
    <thead>
        <tr>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>feeler</th>

        </tr>
    </thead>
    @foreach($feelings  as $f)
        <tr>
            <td>'{{substr($f->year,2)}} w {{$f->week}}</td>
            <td>
               {{$f->mood}}
            </td>
            <td>{{$f->user->name}}</td>
        </tr>
    @endforeach
    </table>
    @endadmin
@endsection