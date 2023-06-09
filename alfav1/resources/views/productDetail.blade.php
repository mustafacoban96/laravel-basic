@extends('layouts.app')



@section('title')
    Product
@endsection

@section('content')
    <h2 style="text-align: center">Ürün detayları</h2>
    <div class="product-detail">
        <div class="product-image-area">
            <div class="product-big-image">
                <a id="prev">&#10094;</a>
                <img id="big-image" src={{$product_images[0]}}>
                <a id="next">&#10095;</a>
            </div>
            <div class="product-small-image">
                @foreach ($product_images as $image)
                <div class="small-product-pic">
                    <img id="small-picture" src={{$image}}>
                </div>
                @endforeach
            </div>
        </div>
        <div class="product-features-area">
            <h3>ÜRÜN ADI: ATLET TİPİ MARKET ve ALIŞVERİŞ ÇANTASI</h3>
            <p>Ürün Tanımı: {{$product->product_description}}</p>
            <p>Çanta Eni: {{$product->width}}</p>
            <p>Çanta Yüksekliği: {{$product->height}}</p>
            <p>Körük: {{$product->gusset}}</p>
            <div class="product-detail-button"><button>Detaylı Bilgi İste</button></div>
        </div>
    </div>

@endsection