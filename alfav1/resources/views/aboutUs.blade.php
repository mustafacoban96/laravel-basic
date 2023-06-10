@extends('layouts.app')

@section('title')
    About Us
@endsection


@section('content')
    <div class="about-page">
        <div class="about-content">
            <img src="/images/about_us/aboutUs.png" alt="">
            <div class="about-text-area">
                <h1>@lang('hakkimizda.1')</h1>
                <p>@lang('hakkimizda.2')</p>
            </div>
        </div>

        <div class="about-content">
            <div class="about-text-area">
                <h1>@lang('hakkimizda.3')</h1>
                <p>@lang('hakkimizda.4')</p>
            </div>
            <img src="/images/about_us/vision.png" alt="">
            
        </div>
        <div class="about-content">
            <img src="/images/about_us/mission.png" alt="">
            <div class="about-text-area">
                <h1>@lang('hakkimizda.5')</h1>
                <p>@lang('hakkimizda.6')</p>
            </div>
        </div>
    </div>
@endsection