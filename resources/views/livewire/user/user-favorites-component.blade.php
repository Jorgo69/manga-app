<main class="main">
    <section class="home-slider position-relative pt-50">
        <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
            <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    @php
                         $i = rand(1, 6);
                    @endphp
                    <div class="row">
                        @forelse ($favorites as $favorite)
                            @php
                                $i = ($i % 6) + 1; // Pour que $i soit toujours entre 1 et 6
                            @endphp
                            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6 col-4">
                                <a href="{{ route('manga.chapters.liste', ['slug' => $favorite->manga->slug])}}">
                                    <div class="banner-features wow fadeIn animated hover-up animated animated" style="visibility: visible;">
                                        <img src="{{ asset('assets/imgs/mangas')}}/{{$favorite->manga->cover_image}}"  alt="{{$favorite->title}}">
                                        {{-- <img src="{{$favorite->manga->cover_image }}" alt="{{$favorite->title}}"> --}}
                                        <h4 class="bg-{{$i}}">{{$favorite->manga->title}} </h4>
                                        {{-- <h2 class="text-sm">{{substr($favorite->author->pseudo, 0, 5) }} ...</h2> --}}
                                    </div>
                                </a>
                            </div>
                        @empty
                            
                        @endforelse
                </div>
            </div>      
        </div>
    </section>
    
    {{-- @push('title')
    <title>{{ $pageTitle }}</title>
    @endpush --}}
</main>