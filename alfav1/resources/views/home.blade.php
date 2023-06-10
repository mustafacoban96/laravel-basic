@extends('layouts.app')


@section('title')
    Home
@endsection

@section('content')
   <div class="slide-part">
        <div class="slide" id="slides">
            <img src="/images/slide_images/bag1.jpg">
        </div>
        <div class="slide" id="slides">
            <img src="/images/slide_images/bag2.jpg">
        </div>
        <div class="slide" id="slides">
            <img src="/images/slide_images/bag4.jpg">
        </div>
        <div class="slide" id="slides">
            <img src="/images/slide_images/bag5.jpg">
        </div>
        <div class="slide-controller">
            <a class="prev" >&#10094;</a>
            <div class="dot-area" style="text-align:center">
                
            </div>
            <a class="next">&#10095;</a>
        </div>
        
   </div>
   <div class="home-content">
        <div class="home-text-area">
            <h1>@lang('anasayfa.1')</h1>
            <p>
                @lang('anasayfa.2')
            </p>
        </div>
        <div class="home-content-cards">
                
            <div class="card-area">
                <img src="/images/home/bag7.jpg">
            </div>
            <div class="card-area">
                <img src="/images/home/bag6.jpg">
            </div>
            <div class="card-area">
                <img src="/images/home/bag8.jpg">
            </div>
        </div>
        <div class="home-text-area">
            <h1>@lang('anasayfa.3')</h1>
            <p>
                @lang('anasayfa.4')
            </p>
        </div>
    </div>
@endsection