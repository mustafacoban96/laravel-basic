@extends('layouts.app')



@section('title')
    Product
@endsection

@section('content')
    <div class="product-area">
        <div class="product">
            <a href="products/{{$products[0]->id}}">
                <img class="kategori-pic" src={{$products[0]->image_path}}>
                <span class="kategori-title">{{$products[0]->name}}</span>
            </a>    
        </div>
        <div class="product">
            <a href="products/{{$products[1]->id}}">
                <img class="kategori-pic" src={{$products[1]->image_path}}>
                <span class="kategori-title">{{$products[1]->name}}</span>
            </a>    
        </div>
        <div class="product">
            <a href="products/{{$products[2]->id}}">
                <img class="kategori-pic" src={{$products[2]->image_path}}>
                <span class="kategori-title">{{$products[2]->name}}</span>
            </a>    
        </div>
    </div>
    <div class="product-area2">
        <div class="product">
            <a href="products/{{$products[3]->id}}">
                <img class="kategori-pic" src={{asset($products[3]->image_path)}}>
                <span class="kategori-title">{{$products[3]->name}}</span>
            </a>    
        </div>
        <div class="product">
            <a href="products/{{$products[4]->id}}">
                <img class="kategori-pic" src={{$products[4]->image_path}}>
                <span class="kategori-title">{{$products[4]->name}}</span>
            </a>    
        </div>
    </div>
@endsection