<main class="main">
    <section class="home-slider position-relative pt-50">
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
        <div class="slider-arrow hero-slider-1-arrow"></div>
    </section>
    
    <section class="product-tabs section-padding position-relative wow fadeIn animated">
        <div class="bg-square"></div>
        <div class="container">
            <div class="tab-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Tout</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link " id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two" aria-selected="false">Vedettes</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-four" data-bs-toggle="tab" data-bs-target="#tab-four" type="button" role="tab" aria-controls="tab-four" aria-selected="false">MIse a jour</button>
                    </li>
                </ul>
                <a href="#" class="view-more d-none d-md-flex">Voir Plus<i class="fi-rs-angle-double-small-right"></i></a>
            </div>
            <!--End nav-tabs-->
            <div class="tab-content wow fadeIn animated" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">
                        {{-- <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.html">
                                            <img class="default-img" src="{{asset('assets/imgs/shop/product-1-1.jpg' ) }}" alt="">
                                            <img class="hover-img" src="{{asset('assets/imgs/shop/product-1-2.jpg' ) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="shop.html">Genre</a>
                                    </div>
                                    <h2><a href="product-details.html">Nom de l'ouvre</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <!-- Pourcentage en like ou etoile -->
                                            <span>90% </span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>Nom de l'auteur</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Favoris" class="action-btn hover-up" href="cart.html"> <i class="fas fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="container">
                            @php
                                 $i = rand(1, 6);
                            @endphp
                            <div class="row">
                                @forelse ($chapters as $chapter)
                                    @php
                                        $i = ($i % 6) + 1; // Pour que $i soit toujours entre 1 et 6
                                    @endphp
                                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6 col-4">
                                        <a href="{{ route('manga.chapters.liste', ['slug' => $chapter->slug])}}">
                                            <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                                <img src="{{ asset('assets/imgs/mangas')}}/{{$chapter->manga->cover_image}}"  alt="{{substr($chapter->title, 0, 5)}}">
                                                {{-- <img src="{{$chapter->manga->cover_image }}" alt="{{$chapter->title}}"> --}}
                                                <h4 class="bg-{{$i}}">{{substr($chapter->title, 0, 10)}} ...</h4>
                                                {{-- <h2 class="text-sm">{{substr($chapter->author->pseudo, 0, 5) }} ...</h2> --}}
                                            </div>
                                        </a>
                                    </div>
                                @empty
                                    
                                @endforelse
                        </div>
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab one (Featured)-->
                <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                    <div class="row product-grid-4">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-1.jpg') }}" alt="">
                                        <h4 class="bg-1">Premier Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-1.jpg') }}" alt="">
                                        <h4 class="bg-3">Deuxieme Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-1.jpg') }}" alt="">
                                        <h4 class="bg-2">Troisieme Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-1.jpg') }}" alt="">
                                        <h4 class="bg-4">Quatrieme Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-1.jpg') }}" alt="">
                                        <h4 class="bg-5">Cinquieme Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-1.jpg') }}" alt="">
                                        <h4 class="bg-6">Sixieme Chapitre</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-1.jpg') }}" alt="">
                                        <h4 class="bg-1">Premier Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-1.jpg') }}" alt="">
                                        <h4 class="bg-3">Deuxieme Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-1.jpg') }}" alt="">
                                        <h4 class="bg-2">Troisieme Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-1.jpg') }}" alt="">
                                        <h4 class="bg-4">Quatrieme Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-1.jpg') }}" alt="">
                                        <h4 class="bg-5">Cinquieme Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-1.jpg') }}" alt="">
                                        <h4 class="bg-6">Sixieme Chapitre</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-1.jpg') }}" alt="">
                                        <h4 class="bg-1">Premier Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-1.jpg') }}" alt="">
                                        <h4 class="bg-3">Deuxieme Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-1.jpg') }}" alt="">
                                        <h4 class="bg-2">Troisieme Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-1.jpg') }}" alt="">
                                        <h4 class="bg-4">Quatrieme Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-1.jpg') }}" alt="">
                                        <h4 class="bg-5">Cinquieme Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-1.jpg') }}" alt="">
                                        <h4 class="bg-6">Sixieme Chapitre</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab two (Popular)-->
                <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                    <div class="row product-grid-4">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-1.jpg') }}" alt="">
                                        <h4 class="bg-1">Premier Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-1.jpg') }}" alt="">
                                        <h4 class="bg-3">Deuxieme Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-3.png') }}" alt="">
                                        <h4 class="bg-2">Troisieme Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-4.png') }}" alt="">
                                        <h4 class="bg-4">Quatrieme Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-5.png') }}" alt="">
                                        <h4 class="bg-5">Cinquieme Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-6.png') }}" alt="">
                                        <h4 class="bg-6">Sixieme Chapitre</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-1.jpg') }}" alt="">
                                        <h4 class="bg-1">Premier Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-1.jpg') }}" alt="">
                                        <h4 class="bg-3">Deuxieme Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-3.png') }}" alt="">
                                        <h4 class="bg-2">Troisieme Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-4.png') }}" alt="">
                                        <h4 class="bg-4">Quatrieme Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-5.png') }}" alt="">
                                        <h4 class="bg-5">Cinquieme Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-6.png') }}" alt="">
                                        <h4 class="bg-6">Sixieme Chapitre</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-1.jpg') }}" alt="">
                                        <h4 class="bg-1">Premier Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-1.jpg') }}" alt="">
                                        <h4 class="bg-3">Deuxieme Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-3.png') }}" alt="">
                                        <h4 class="bg-2">Troisieme Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-4.png') }}" alt="">
                                        <h4 class="bg-4">Quatrieme Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-5.png') }}" alt="">
                                        <h4 class="bg-5">Cinquieme Chapitre</h4>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{asset('assets/imgs/theme/icons/feature-6.png') }}" alt="">
                                        <h4 class="bg-6">Sixieme Chapitre</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab three (New added)-->
            </div>
            <!--End tab-content-->
        </div>
    </section>
    <section class="banner-2 section-padding pb-0">
        <div class="container">
            <div class="banner-img banner-big wow fadeIn animated f-none">
                <img src="{{asset('assets/imgs/banner/banner-4.png') }}" alt="">
                <div class="banner-text d-md-block d-none">
                    <h4 class="mb-15 mt-40 text-brand">Repair Services</h4>
                    <h1 class="fw-600 mb-20">Autorisation <br>de mettre de Pub ici</h1>
                    <a href="shop.html" class="btn">Lire Plus <i class="fi-rs-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <section class="popular-categories section-padding mt-15 mb-25">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>Genres </span> Populaires</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
                <div class="carausel-6-columns" id="carausel-6-columns">
                    @forelse ($mangas as $manga)
                    <div class="card-1">
                        <figure class=" img-hover-scale overflow-hidden">
                            <a href="shop.html"><img src="{{asset('assets/imgs/mangas')}}/{{$manga->cover_image}}" alt=""></a>
                        </figure>
                        <h5><a href="shop.html">{{ substr( $manga ->title, 0, 20) }} ...</a></h5>
                    </div>
                    @empty
                        
                    @endforelse
                    
                    {{-- <div class="card-1">
                        <figure class=" img-hover-scale overflow-hidden">
                            <a href="shop.html"> <img src="{{asset('assets/imgs/shop/category-thumb-2.jpg' ) }}" alt=""></a>
                        </figure>
                        <h5><a href="shop.html">Bags</a></h5>
                    </div>
                    <div class="card-1">
                        <figure class=" img-hover-scale overflow-hidden">
                            <a href="shop.html"><img src="{{asset('assets/imgs/shop/category-thumb-3.jpg' ) }}" alt=""></a>
                        </figure>
                        <h5><a href="shop.html">Sandan</a></h5>
                    </div>
                    <div class="card-1">
                        <figure class=" img-hover-scale overflow-hidden">
                            <a href="shop.html"><img src="{{asset('assets/imgs/shop/category-thumb-4.jpg' ) }}" alt=""></a>
                        </figure>
                        <h5><a href="shop.html">Scarf Cap</a></h5>
                    </div>
                    <div class="card-1">
                        <figure class=" img-hover-scale overflow-hidden">
                            <a href="shop.html"><img src="{{asset('assets/imgs/shop/category-thumb-5.jpg' ) }}" alt=""></a>
                        </figure>
                        <h5><a href="shop.html">Shoes</a></h5>
                    </div>
                    <div class="card-1">
                        <figure class=" img-hover-scale overflow-hidden">
                            <a href="shop.html"><img src="{{asset('assets/imgs/shop/category-thumb-6.jpg' ) }}" alt=""></a>
                        </figure>
                        <h5><a href="shop.html">Pillowcase</a></h5>
                    </div>
                    <div class="card-1">
                        <figure class=" img-hover-scale overflow-hidden">
                            <a href="shop.html"><img src="{{asset('assets/imgs/shop/category-thumb-7.jpg' ) }}" alt=""></a>
                        </figure>
                        <h5><a href="shop.html">Jumpsuits</a></h5>
                    </div>
                    <div class="card-1">
                        <figure class=" img-hover-scale overflow-hidden">
                            <a href="shop.html"><img src="{{asset('assets/imgs/shop/category-thumb-8.jpg' ) }}" alt=""></a>
                        </figure>
                        <h5><a href="shop.html">Hats</a></h5>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>Recemment </span> Ajouter</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
                <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                    <div class="product-cart-wrap small hover-up">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="product-details.html">
                                    <img class="default-img" src="{{asset('assets/imgs/shop/product-2-1.jpg' ) }}" alt="">
                                    <img class="hover-img" src="{{asset('assets/imgs/shop/product-2-2.jpg' ) }}" alt="">
                                </a>
                            </div>
                            <div class="product-action-1">
                                <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                    <i class="fi-rs-eye"></i></a>
                                <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                                <a aria-label="Compare" class="action-btn small hover-up" href="compare.php" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="hot">Hot</span>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <h2><a href="product-details.html">Nom de l'ouvre</a></h2>
                            <div class="product-price">
                                <span>Nom de  l'auteur</span>
                            </div>
                        </div>
                    </div>
                    <!--End product-cart-wrap-2-->
                    <div class="product-cart-wrap small hover-up">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="product-details.html">
                                    <img class="default-img" src="{{asset('assets/imgs/shop/product-2-1.jpg' ) }}" alt="">
                                    <img class="hover-img" src="{{asset('assets/imgs/shop/product-2-2.jpg' ) }}" alt="">
                                </a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="new">New</span>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <h2><a href="product-details.html">Nom de l'ouvre</a></h2>
                            <div class="product-price">
                                <span>Nom de  l'auteur</span>
                            </div>
                        </div>
                    </div>
                    <!--End product-cart-wrap-2-->
                    <div class="product-cart-wrap small hover-up">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="product-details.html">
                                    <img class="default-img" src="{{asset('assets/imgs/shop/product-2-1.jpg' ) }}" alt="">
                                    <img class="hover-img" src="{{asset('assets/imgs/shop/product-2-2.jpg' ) }}" alt="">
                                </a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="new">New</span>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <h2><a href="product-details.html">Nom de l'ouvre</a></h2>
                            <div class="product-price">
                                <span>Nom de  l'auteur</span>
                            </div>
                        </div>
                    </div>
                    <!--End product-cart-wrap-2-->
                    <div class="product-cart-wrap small hover-up">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="product-details.html">
                                    <img class="default-img" src="{{asset('assets/imgs/shop/product-2-1.jpg' ) }}" alt="">
                                    <img class="hover-img" src="{{asset('assets/imgs/shop/product-2-2.jpg' ) }}" alt="">
                                </a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="new">New</span>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <h2><a href="product-details.html">Nom de l'ouvre</a></h2>
                            <div class="product-price">
                                <span>Nom de  l'auteur</span>
                            </div>
                        </div>
                    </div>
                    <!--End product-cart-wrap-2-->
                    <div class="product-cart-wrap small hover-up">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="product-details.html">
                                    <img class="default-img" src="{{asset('assets/imgs/shop/product-2-1.jpg' ) }}" alt="">
                                    <img class="hover-img" src="{{asset('assets/imgs/shop/product-2-2.jpg' ) }}" alt="">
                                </a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="new">New</span>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <h2><a href="product-details.html">Nom de l'ouvre</a></h2>
                            <div class="product-price">
                                <span>Nom de  l'auteur</span>
                            </div>
                        </div>
                    </div>
                    <!--End product-cart-wrap-2-->
                    <div class="product-cart-wrap small hover-up">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="product-details.html">
                                    <img class="default-img" src="{{asset('assets/imgs/shop/product-2-1.jpg' ) }}" alt="">
                                    <img class="hover-img" src="{{asset('assets/imgs/shop/product-2-2.jpg' ) }}" alt="">
                                </a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="new">New</span>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <h2><a href="product-details.html">Nom de l'ouvre</a></h2>
                            <div class="product-price">
                                <span>Nom de  l'auteur</span>
                            </div>
                        </div>
                    </div>
                    <!--End product-cart-wrap-2-->
                    <div class="product-cart-wrap small hover-up">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="product-details.html">
                                    <img class="default-img" src="{{asset('assets/imgs/shop/product-2-1.jpg' ) }}" alt="">
                                    <img class="hover-img" src="{{asset('assets/imgs/shop/product-2-2.jpg' ) }}" alt="">
                                </a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="new">New</span>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <h2><a href="product-details.html">Nom de l'ouvre</a></h2>
                            <div class="product-price">
                                <span>Nom de  l'auteur</span>
                            </div>
                        </div>
                    </div>
                    <!--End product-cart-wrap-2-->
                </div>
            </div>
        </div>
    </section>
   
    <section class="section-padding">
        <div class="container">
            <h3 class="section-title mb-20 wow fadeIn animated"><span>Marque mis en Vedette</span> Partenaire</h3>
            <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
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