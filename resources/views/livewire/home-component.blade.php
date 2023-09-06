<main class="main">
    <section class="home-slider position-relative pt-50">
        @forelse ($featureds as $featured)
        @php
            $i = rand(1, 6);
            $i = ($i % 3) + 1; // Pour que $i soit toujours entre 1 et 3
        @endphp
        <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
            <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-5 col-md-6">
                            <div class="hero-slider-content-2">
                                <h4 class="animated">Mangas Vedettes</h4>
                                <h2 class="animated fw-900">{{$featured->title}}</h2>
                                <h3 class="animated fw-900 text-brand">Oeuvre de {{$featured->author->pseudo}}</h3>
                                <a class="animated btn btn-brush btn-brush-{{$i}}" href="{{ route('manga.liste', ['slug' => $featured->slug])}}"> Voir Plus </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="single-slider-img single-slider-img-1">
                                <img class="animated slider-1-1" src="{{asset('assets/imgs/slider/slider-1.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>               
        </div>
        <div class="slider-arrow hero-slider-1-arrow"></div>
        @empty
        <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
            <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-5 col-md-6">
                            <div class="hero-slider-content-2">
                                <h4 class="animated">Trade-in offer</h4>
                                <h2 class="animated fw-900">Supper value deals</h2>
                                <h1 class="animated fw-900 text-brand">On all products</h1>
                                <p class="animated">Save more with coupons & up to 70% off</p>
                                <a class="animated btn btn-brush btn-brush-3" href="product-details.html"> Shop Now </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="single-slider-img single-slider-img-1">
                                <img class="animated slider-1-1" src="{{asset('assets/imgs/slider/slider-1.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-5 col-md-6">
                            <div class="hero-slider-content-2">
                                <h4 class="animated">Hot Quatrieme Chapitre</h4>
                                <h2 class="animated fw-900">Fashion Trending</h2>
                                <h1 class="animated fw-900 text-7">Great Collection</h1>
                                <p class="animated">Save more with coupons & up to 20% off</p>
                                <a class="animated btn btn-brush btn-brush-2" href="product-details.html"> 
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="single-slider-img single-slider-img-1">
                                <img class="animated slider-1-2" src="{{asset('assets/imgs/slider/slider-2.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>                
        </div>
        @endforelse
        
    </section>
    
    <section class="product-tabs section-padding position-relative   fadeIn animated">
        <div class="bg-square"></div>
        <div class="container">
            <div class="tab-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Chapitres</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two" aria-selected="false">Mangas</button>
                    </li>
                </ul>
                <a href="#" class="view-more d-none d-md-flex">Voir Plus<i class="fi-rs-angle-double-small-right"></i></a>
            </div>
            <!--End nav-tabs-->
            <div class="tab-content   fadeIn animated" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">
                        <div class="container">
                            @php
                            $i = rand(1, 6);
                            @endphp
                            <div class="row">
                                @forelse ($chapters as $chapter)
                                @php
                                $i = ($i % 6) + 1; // Pour que $i soit toujours entre 1 et 6
                                @endphp
                                <div class="col-lg-2 col-md-4 col-sm-6 col-4 mb-4">
                                    <a href="{{ route('manga.chapters.liste', ['slug' => $chapter->slug]) }}">
                                        <div class="banner-features text-center fadeIn animated hover-up animated animated">
                                                <img class="default-img" src="{{ asset('assets/imgs/mangas')}}/{{$chapter->manga->cover_image}}" alt="{{$chapter->title}}">
                                        </div>
                                        <div class="product-content-wrap">
                                            <h4><a href="{{ route('manga.chapters.liste', ['slug' => $chapter->slug]) }}">#{{$chapter->chapter_number}}</a></h4>
                                            <div class="product-price">
                                                <span>{{$chapter->manga->title}}</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @empty
                
                                @endforelse
                            </div>
                        </div>
                        <!--End product-grid-4-->
                    </div>
                </div>
                <!--En tab one (Featured)-->
                <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                    <div class="row product-grid-4">
                        <div class="container">
                            <div class="row">
                                @forelse ($mangas as $manga)
                                @php
                                $i = ($i % 6) + 1; // Pour que $i soit toujours entre 1 et 6
                                @endphp
                                <div class="col-lg-2 col-md-4 col-sm-6 col-6 mb-4">
                                    <a href="{{ route('manga.liste', ['slug' => $manga->slug])}}">
                                        <div class="banner-features text-center fadeIn animated hover-up animated animated">
                                            <a href="product-details.html">
                                                <img class="default-img" src="{{ asset('assets/imgs/mangas')}}/{{$manga->cover_image}}" alt="">
                                            </a>
                                        </div>
                                        <div class="product-content-wrap">
                                            <h4><a href="{{ route('manga.liste', ['slug' => $manga->slug])}}">{{$manga->title}}</a></h4>
                                        </div>
                                    </a>
                                </div>
                                @empty
                                Aucun
                                @endforelse
                            </div>
                        </div>
                    </div>
                                    <!--End product-grid-4-->
                </div>
            </div>
            <!--End tab-content-->
        </div>
    </section>
    <section class="banner-2 section-padding pb-0">
        <div class="container">
            <div class="banner-img banner-big   fadeIn animated f-none">
                <img src="{{asset('assets/imgs/banner/banner-4.png') }}" alt="">
                <div class="banner-text d-md-block d-none">
                    <h4 class="mb-15 mt-40 text-brand">Publicite</h4>
                    <h1 class="fw-600 mb-20">Autorisation <br>de mettre de Pub ici</h1>
                    <a href="#" class="btn">Lire Plus <i class="fi-rs-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
   
    <section class="section-padding">
        <div class="container">
            <h3 class="section-title mb-20   fadeIn animated"><span>Marque Vedette</span> Partenaire</h3>
            <div class="carausel-6-columns-cover position-relative   fadeIn animated">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-3-arrows"></div>
                <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="{{asset('assets/imgs/banner/brand-1.png') }}" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="{{asset('assets/imgs/banner/brand-2.png') }}" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="{{asset('assets/imgs/banner/brand-3.png') }}" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="{{asset('assets/imgs/banner/brand-4.png') }}" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="{{asset('assets/imgs/banner/brand-5.png') }}" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="{{asset('assets/imgs/banner/brand-6.png') }}" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="{{asset('assets/imgs/banner/brand-3.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('title')
    <title>{{ $pageTitle }}</title>
    @endpush
</main>