<main class="main">
    <section class="home-slider position-relative pt-50">
        <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
            <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    @forelse ($favorites as $favorite)
                        {{$favorite ->manga->title}}
                    @empty
                        Rien
                    @endforelse
                </div>
            </div>      
        </div>
        {{-- <div class="slider-arrow hero-slider-1-arrow"></div> --}}
    </section>
    {{-- @push('title')
    <title>{{ $pageTitle }}</title>
    @endpush --}}
</main>