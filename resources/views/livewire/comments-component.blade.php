<div class="">
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ route('home.index')}}" rel="nofollow">Accueil</a>
                    <span></span> Commentaire
                    <span></span> 
                    {{-- <span></span> {{substr($chapter ->title, 0, 5)}} || titre du chap --}}
                </div>
            </div>
        </div>
        @auth
        <section class="mt-50 mb-50">
        <div class="container custom">
            <div class="row">
                <form wire:submit.prevent='AddComment'>
                    @error('content')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <textarea name="" id="" cols="30" rows="10" wire:model='content'></textarea>
                    <button class="btn btn-info md-3 float-end">Commenter</button>
                </form>
                </div>
            </div>
        </div>
    </section>
    @endauth
        <section class="mt-50 mb-50">
            <div class="container custom">
                @forelse ($comments as $comment)
                <div class="row">
                    <div class="col-md-12 wow fadeIn animated hover-up mb-30">
                            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column">
                                <strong class="d-inline-block mb-2 text-primary"> {{ $comment->user->pseudo}} </strong>
                                {{-- <h3 class="mb-0">Featured post</h3> --}}
                                    <div class="col-md-2">
                                        <p>{{$comment ->content}}</p>
                                    </div>
                                </div>
                                @if ($comment->user_id === Auth::id())
                                <button></button>
                                @endif
                            </div>
                    </div>
                </div>
                @empty
                Rien
                @endforelse
            </div>
        </section>
    </main>
        {{-- le titre de la page du composant --}}
        @push('title')
            <title>{{ $pageTitle }}</title>
        @endpush
</div>