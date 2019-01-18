@extends('layouts.nes')

@section('content')
    <table class="nes-table is-bordered">
    <thead>
        <tr>
            <th>&nbsp;</th>
            <th>key</th>
            <th>value</th>

        </tr>
    </thead>
    @foreach($options as $o)
        <tr>
            <td>{{$o->id}}</td>
            <td>
               {{$o->key}}
            </td>
            <td>
                <form action="{{route('options.put')}}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$o->id}}">
                    <div class="nes-field is-inline">
                        <input class="nes-input" name="value" value="{{$o->value}}" />
                        <button><i class="snes-jp-logo"></i></button>
                    </div>
                </form>
            </td>
        </tr>
    @endforeach
    </table>

    <section class="nes-container">
        <form action="{{route('options.post')}}" class="form" method="post">
            @csrf
            @method('POST')
            <div class="nes-field is-inline">
            <label for="key">Key</label>
                <input id="key" type="text" name="key" class="nes-input">
            </div>
            <div class="nes-field is-inline">
                <label for="value">value</label>
                <input id="value" type="text" name="value" class="nes-input">
            </div>
            <button class="nes-btn">+ Add</button>
        </form>
    </section>
    
@endsection