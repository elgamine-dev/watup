@extends('layouts.nes')

@section('content')
<div class="container">
    <div class="row justify-content-center">
                <div class="card-body">
                    <form method="POST" class="form" action="{{ route('signin') }}">
                        @csrf
                        <div class="nes-field is-inline">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                            <input id="email" type="email" class="nes-input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>&nbsp;
                            <button type="submit" class="nes-btn is-primary">
                                {{ __('Send Login Mail') }}
                            </button>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                

                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
