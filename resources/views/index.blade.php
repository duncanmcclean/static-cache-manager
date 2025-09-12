@php
    use function Statamic\trans as __;
@endphp

@extends('statamic::layout')
@section('title', __('Static Cache Manager'))

@section('content')
    <ui-header title="{{ __('Static Cache Manager') }}" icon="{{ $icon }}"></ui-header>

    <ui-card-panel heading="{{ __('Invalidation') }}" subheading="{{ __('Which paths would you like to clear? One line per path.') }}">
        <form method="POST" action="{{ cp_route('utilities.static-cache-manager.clear') }}">
            @csrf

            <div>
                <ui-textarea
                    class="mb-4"
                    rows="6"
                    name="paths"
                    placeholder="Eg: blog/2020"
                    model-value="{{ implode("\n", config('static-cache-manager.defaults.paths')) }}"
                ></ui-textarea>
                <ui-button text="{{ __('Invalidate') }}" type="submit" variant="primary"></ui-button>
            </div>
        </form>
    </ui-card-panel>
@stop
