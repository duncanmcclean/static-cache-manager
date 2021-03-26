@extends('statamic::layout')
@section('title', __('Static Cache Manager'))

@section('content')
    <div class="flex items-center justify-between">
        <h1>{{ __('Static Cache Manager') }}</h1>
    </div>

    <div class="mt-3 card">
        <p class="mb-2">Which paths would you like to clear? One line per path.</p>

        <form method="POST" action="{{ cp_route('utilities.static-cache-manager.clear') }}">
            @csrf

            <textarea class="input-text mb-1 w-1/2" rows="6" name="paths" placeholder="Eg: blog/2020">{{ config('static-cache-manager.defaults.paths') }}</textarea>

            <div>
                <button type="submit" class="btn-primary">Clear</button>
            </div>
        </form>
    </div>
@stop
