    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ route('home.index')}}" rel="nofollow">Accueil</a>
                    <span></span> Titre
                    <span></span> {{$chapter ->title}}
                    {{-- <span></span> {{substr($chapter ->title, 0, 5)}} || titre du chap --}}
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50" style="background: transparent;"
        oncontextmenu="return false;" onselectstart="return false;" ondragstart="return false;">
            <div class="container custom" style="background: transparent;"
            oncontextmenu="return false;" onselectstart="return false;" ondragstart="return false;">
                <div class="row" style="background: transparent;"
                oncontextmenu="return false;" onselectstart="return false;" ondragstart="return false;">
                    {{-- <img src="{{ asset('assets/imgs/chapters') }}/{{ $chapter->content }}" alt=""
                        oncontextmenu="return false;"
                        style="pointer-events: none;"> --}}
                        @foreach (json_decode($chapter->content) as $key => $contentImage)
                        <img src="{{ asset('assets/imgs/chapters') }}/{{ $contentImage }}" alt=""
                        oncontextmenu="return false;" onselectstart="return false;" ondragstart="return false;">
                        @endforeach
                </div>
            </div>
        </section>
        
        @auth
            <section class="mt-50 mb-50">
            <div class="container custom">
                <div class="row">
                    <form wire:submit.prevent='AddComment'>
                        <textarea name="" id="" cols="30" rows="10" wire:model='content'></textarea>
                        <button class="btn btn-info md-3 float-end">Commenter</button>
                        @error('content')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </form>
                    {{-- <a type="button" class="btn btn-info md-3 float-end" href="{{ route('chapter.comment', ['slug' => $chapter->slug])}}">Commenter</a> --}}
                    {{-- <div class="col-md-3"></div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <a type="button" class="btn btn-info md-2 float-end" href="{{ route('chapter.comment', ['slug' => $chapter->slug])}}">Commenter</a> --}}
                    {{-- <button >Commenter</button> --}}
                    </div>
                </div>
            </div>
        </section>
        @endauth
        @push('title')
            <title>{{ $pageTitle }}</title>
        @endpush
    </main>