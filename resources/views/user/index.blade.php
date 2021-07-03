@extends('layouts.user_sidebar')

@section('content')

<div class="block-content block-content-full">
    <div class="card">
        <div class="block">

            <div id="app">
                <Application email="{{ auth()->user()->email }}"/>
            </div>
        </div>
    </div>
</div>


@endsection
