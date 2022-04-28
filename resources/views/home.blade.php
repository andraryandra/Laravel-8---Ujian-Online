@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      @if(Auth::user()->role == 'admin')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
    
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    
                    You are logged in Status <b>{{ Auth::user()->name }}</b>
                </div>
            </div>
      @endif

      @if(Auth::user()->role == 'siswa')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
    
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    
                    You are logged in Status Siswa <b>{{ Auth::user()->name }}</b>
                </div>
            </div>
      @endif
    </div>
</div>
@endsection
