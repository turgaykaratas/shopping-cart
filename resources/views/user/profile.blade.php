@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            @if (Auth::check()) 
                <h1>Hello {{ Auth::user()->email }}</h1>
            @else
                <h1>Hello</h1>
            @endif
        </div>
    </div>
@endsection