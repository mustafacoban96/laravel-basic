@extends('layouts.app')


@section('title')
    Home
@endsection

@section('content')
   <div class="slide-part">
        <div class="slide" id="slides">
            <img src="/images/bag1.jpg">
        </div>
        <div class="slide" id="slides">
            <img src="/images/bag2.jpg">
        </div>
        <div class="slide" id="slides">
            <img src="/images/bag3.jpg">
        </div>
        <div class="slide" id="slides">
            <img src="/images/bag4.jpg">
        </div>
        <div class="slide" id="slides">
            <img src="/images/bag5.jpg">
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
            <h1>NEDEN ALFA BAG</h1>
            <p>
                Günümüzde, çevre dostu ürünlere olan talep giderek artıyor. 
                Bu nedenle, bez çantalar gibi yeniden kullanılabilir ve geri dönüştürülebilir ürünler özellikle popüler hale gelmiştir. 
                Ancak, kaliteli ve dayanıklı bir bez çanta seçmek önemlidir. İşte burada devreye biz giriyoruz.
                Kalitemiz ve doğa dostu ürünlerimize olan bağlılığımız sayesinde, müşterilerimize en iyi ürünleri sunuyoruz. 
                Bez çantalarımız yüksek kaliteli pamuklu kumaştan üretilir ve uzun yıllar boyunca dayanıklı bir şekilde kullanılabilirler. 
                Ayrıca, üretim sürecimiz tamamen çevre dostudur ve ürünlerimizin geri dönüşümü kolaydır. 
                Bu sayede, hem doğaya olan etkimizi minimize ediyoruz hem de müşterilerimize çevre dostu bir seçenek sunuyoruz.
            </p>
        </div>
        <div class="home-content-cards">
                
            <div class="card-area">
                <img src="/images/bag7.jpg">
            </div>
            <div class="card-area">
                <img src="/images/bag6.jpg">
            </div>
            <div class="card-area">
                <img src="/images/bag8.jpg">
            </div>
        </div>
        <div class="home-text-area">
            <h1>Çevre Dostu Bez Çanta Çözümlerimizle En İyi Alışveriş Deneyimini Sunuyoruz</h1>
            <p>
                Sadece kaliteli ürünlerimiz ve çevre dostu üretim sürecimizle değil, aynı zamanda müşteri memnuniyetine verdiğimiz önemle de öne çıkıyoruz. 
                Müşterilerimize en iyi alışveriş deneyimini sunmak için çalışıyoruz ve her müşterimizle yakından ilgileniyoruz. 
                İster büyük bir toptancı olun, isterse küçük bir butik işletmesi, sizin için doğru bez çanta çözümlerimizi sunmaktan mutluluk duyuyoruz.
                bizimle çalışarak, hem doğayı koruma konusunda bir fark yaratıyoruz hem de işletmeniz için kaliteli, dayanıklı ve çevre dostu bir ürün sağlıyoruz. 
                Müşteri memnuniyetini en üst seviyede tutuyoruz ve sizlere en iyi alışveriş deneyimini sunmaya devam edeceğiz.
            </p>
        </div>
    </div>
@endsection