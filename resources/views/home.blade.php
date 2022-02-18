@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>HOME</h2>
            </div>
            <div class="col-12">
                <a href="{{ url('/') }}">Home</a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <div class="alert">
                        <a href="{{ url('/') }}">Go To Home</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
