
<div class="header-container">
    <div class="pre-header" id="pre-header">
        <ul id="pre-header-items">
            <li class="pre-header-item">
                <a href="#"><i class="fa-solid fa-phone"></i>0531 969 48 82</a>
            </li>
            <li class="pre-header-item">
                <a href="#"><i class="fa-solid fa-envelope"></i>alfa@bez.com.tr</a>
            </li>
        </ul>
        <ul id="pre-header-language">
            <li class="pre-header-item">
                <a href="{{ route('locale', ['locale' => 'tr']) }}" class="pre-lang">TUR</a>
            </li>
            <li class="pre-header-item">
                <p>/</p>
            </li>
            <li class="pre-header-item">
                {{-- "{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), 'en') }}" --}}
                <a href="{{ route('locale', ['locale' => 'en']) }}">ENG</a>
            </li>
        </ul>
    </div>
    <div class="main-header">
        <div class="main-header-img">
            <img src="/images/AlfaLogo3.jpeg">
        </div>
        <div class="main-header-list">
            <ul id="main-header-items">
                <li class="main-header-item"><a href="{{route('home')}}">@lang('header.1')</a></li>
                <li class="main-header-item"><a href="{{route('products')}}">@lang('header.2')</a></li>
                <li class="main-header-item"><a href="{{route('aboutUs')}}">@lang('header.3')</a></li>                
                <li class="main-header-item"><a href="{{route('contact')}}">@lang('header.4')</a></li>
                <li class="main-header-icon"><button id="toggle-btn"><i class="fa fa-bars"></i></button></li>
            </ul>
        </div>
    </div>
</div>
<div class="header-icon-list">
    <div class="main-header-icon-item"><a href="{{route('home')}}">@lang('header.1')<hr style="color:white"></a></div>
    <div class="main-header-icon-item"><a href="{{route('products')}}">@lang('header.2')<hr style="color:white"></a></div>
    <div class="main-header-icon-item"><a href="{{route('aboutUs')}}">@lang('header.3')<hr style="color:white"></a></div>                
    <div class="main-header-icon-item"><a href="{{route('contact')}}">@lang('header.4')<hr style="color:white"></a></div>
</div>


