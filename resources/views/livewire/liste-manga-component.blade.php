<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home.index')}}" rel="nofollow">Accueil</a>
                <span></span> Titre
                <span></span> {{$manga ->title}}
                {{-- <span></span> {{substr($chapter ->title, 0, 5)}} || titre du chap --}}
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container custom">
            <div class="row">
                <div class="col-lg-9">
                    <div class="single-header mb-50">
                        <h1 class="font-xxl text-brand">{{$manga ->title}}</h1> ||
                        <span></span> Une Oeuvre de {{$manga->author->pseudo}}

                        {{-- @foreach ($mangas as $manga)
                        @foreach ($manga -> genres as $genre)
                            <h4> {{$genre->name}} </h4>
                        @endforeach
                        @endforeach --}}

                        <div class="entry-meta meta-1 font-xs mt-15 mb-15">
                            {{-- <span class="post-by">{{ $chapter->genre->name}}</span> --}}
                            {{-- <span class="post-on has-dot">1020k Article</span> --}}
                            {{-- <span class="time-reading has-dot">{{ substr($chapter->author->nom, 0 ,5)}}</span> || nom de l'auteur --}}
                            {{-- <span class="hit-count  has-dot">29M Views</span> --}}
                        </div>
                    </div>
                    <div class="loop-grid pr-30">
                        <div class="row">
                            <div class="col-12">
                                <article class="first-post mb-30 wow fadeIn animated hover-up">
                                    <div class="img-hover-slide position-relative overflow-hidden">
                                        {{-- <span class="top-right-icon bg-dark"><i class="fi-rs-bookmark"></i></span> --}}
                                        <div class="post-thumb img-hover-scale">
                                            <a href="blog-details.html">
                                                {{-- <img src="{{asset('assets/imgs/blog/blog-6.jpg')}}" alt=""> --}}
                                                <img src="{{asset('assets/imgs/mangas')}}/{{$manga->cover_image}}" alt="" width="100%"
                                                    height="100%">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="entry-content">
                                        <div class="entry-meta meta-1 mb-30">
                                            {{-- <a class="entry-meta meta-0" href="#"><span
                                                    class="post-in background4 text-brand font-xs">Mobile Phone</span></a> --}}
                                            <div class="font-sm">
                                                <span><span class="mr-10 text-muted"><i class="fi-rs-eye"></i></span>23k</span>
                                                {{-- <span class="ml-30"><span class="mr-10 text-muted"><i
                                                            class="fi-rs-comment-alt"></i></span>17k</span>
                                                <span class="ml-30"><span class="mr-10 text-muted"><i class="fi-rs-share"></i></span>18k</span>
                                                --}}
                                            </div>
                                        </div>
                                        <h2 class="post-title mb-20">
                                            <p class="post-exerpt text-strong font-medium text-muted mb-30">{{$manga->description}}</p>
                                            <div class="mb-20 entry-meta meta-2">
                                                <div class="font-xs ">
                                                    {{-- <span class="post-by">By <a href="#">Azimeto</a></span>
                                                    <span class="post-on">12/07/2022 09:35 EST</span>
                                                    <span class="time-reading">8 mins read</span>
                                                    <p class="font-xs mt-5">Updated 18/08/2022 07:12 EST</p> --}}
                                                </div>
                                                @auth
                                                @if (in_array($manga->id, $favorites))
                                                <a href="#" type="button" role="button"
                                                    wire:click.prevent="RemoveFavorite({{ $manga->id }})">
                                                    <i class="fi-rs-bookmark"></i> Supprimer des favoris
                                                </a>
                                                @else
                                                <a href="#" type="button" role="button"
                                                    wire:click.prevent="AddFavorite({{ $manga->id }})">
                                                    <i class="fi-rs-bookmark"></i> Ajouter aux favoris
                                                </a>
                                                @endif
                                                @endauth
                                            </div>
                                    </div>
                                </article>
                            </div>
                        
                            @forelse ( $listes as $liste)
                            <div class="col-md-12 wow fadeIn animated hover-up mb-30">
                                <a href="{{ route('chapter.streaming', ['chapter_id' => $liste->id])}}">
                                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                        <div class="col p-4 d-flex flex-column">
                                            <strong class="d-inline-block mb-2 text-primary"> #{{ $liste ->chapter_number }}</strong>
                                            <span>{{ substr($liste ->title, 0, 30) }}</span>
                                            {{-- <h3 class="mb-0">Featured post</h3> --}}
                                            <div class="mb-1 text-muted"><i class="fi-rs-clock"></i> {{ ($liste ->created_at)->diffForHumans()
                                                }}</div>
                                            <div class="col-md-2">
                                                <a type="button" href="{{ route('chapter.comment', ['chapter_id'=> $liste->id])}}"
                                                    class="btn btn-sm text-light float-right ">Commenter</a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="{{ route('chapter.streaming', ['chapter_id' => $liste->id])}}">
                                                <img src="{{asset('assets/imgs/chapters/covers')}}/{{$liste->chapter_cover}}"
                                                    alt="{{ substr($liste ->title, 0 ,11)}}" width="100" height="100%">
                                                {{-- <img src="{{ asset('assets/imgs/chapters')}}/{{$chapter->manga->cover_image}}"
                                                    alt="product image"> --}}
                        
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @empty
                            Rien a afficher
                            @endforelse
                        
                        </div>
                    </div>
                    <!--post-grid-->
                    <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                                <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">16</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="fi-rs-angle-double-small-right"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <div class="widget-area">
                        <div class="sidebar-widget widget_search mb-50">
                            <div class="search-form">
                                <form action="#">
                                    <input type="text" placeholder="Search…">
                                    <button type="submit"> <i class="fi-rs-search"></i> </button>
                                </form>
                            </div>
                        </div>
                        <!--Widget categories-->
                        <div class="sidebar-widget widget_categories mb-40">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title">Les Genres</h5>
                            </div>
                            <div class="post-block-list post-module-1 post-module-5">
                                <ul>
                                    @forelse ($genres as $genre)
                                        <li class="cat-item cat-item-2"><a href="#">{{ $genre ->name}}</a> {{ substr($genre ->description, 0, 16)}} ...</li>
                                    @empty
                                        <li class="cat-item cat-item-2"><a href="#">Aucun Genre</a></li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <!--Widget latest posts style 1-->
                        <div class="sidebar-widget widget_alitheme_lastpost mb-20">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title">{{ __('Du même auteur')}}</h5>
                            </div>
                            <div class="row">
                                @forelse ($liers as $lier)
                                <div class="col-md-6 col-sm-6 sm-grid-content mb-30">
                                    <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                        <a href="{{ route('manga.liste', ['slug' => $lier->slug])}}">
                                            <img src="{{ asset('assets/imgs/mangas') }}/{{$lier->cover_image }}" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content media-body">
                                        <a href="{{ route('manga.liste', ['slug' => $lier->slug])}}">
                                            <h6 class="post-title text-danger mb-10 text-limit-2-row">{{$lier->title}}</h6>
                                            <div class="entry-meta meta-13 font-xxs color-grey d-inline">
                                                <span class="post-on mr-10">{{$lier->created_at}}</span>
                                                <span class="hit-count has-dot mt-3">126k Views</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @empty
                                    Rien
                                @endforelse
                            </div>
                        </div>
                        <!--Widget ads-->
                        <div class="banner-img wow fadeIn mb-45 animated d-lg-block d-none animated">
                            <img src="{{asset('assets/imgs/banner/banner-11.png') }}" alt="">
                            <div class="banner-text">
                                <span>Women Zone</span>
                                <h4>Save 17% on <br>Office Dress</h4>
                                <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                        <!--Widget Tags-->
                        <div class="sidebar-widget widget_tags mb-50">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title">Mangas Populaire </h5>
                            </div>
                            <div class="tagcloud">
                                <a class="tag-cloud-link" href="#">beautiful</a>
                                <a class="tag-cloud-link" href="#">New York</a>
                                <a class="tag-cloud-link" href="#">droll</a>
                                <a class="tag-cloud-link" href="#">intimate</a>
                                <a class="tag-cloud-link" href="#">loving</a>
                                <a class="tag-cloud-link" href="#">travel</a>
                                <a class="tag-cloud-link" href="#">fighting </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        @push('title')
            <title>{{ $pageTitle }}</title>
        @endpush
</main>