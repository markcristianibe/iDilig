@extends('layouts.app')

@section('body')
    @include('layouts.navbar')

    @if($page == 'home')
        @include('pages.home')
    @elseif($page == 'diagnose')
        @include('pages.diagnose')
    @elseif($page == 'diagnose-result')
        @include('pages.diagnose-result')
    @elseif($page == 'scan')
        @include('pages.scan')
    @elseif($page == 'plant-info')
        @include('pages.plant-info')
    @elseif($page == 'my-plants')
        @include('pages.my-plants')
    @elseif($page == 'user-plant')
        @include('pages.templates.my-plants.my-plant-info')
    @elseif($page == 'account')
        @include('pages.my-account')
    @endif
@endsection