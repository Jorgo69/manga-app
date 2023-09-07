<div class="">
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ route('home.index')}}" rel="nofollow">Liste</a>
                    <span></span> Commentaire
                    <span></span>
                    {{-- <span></span> {{substr($chapter ->title, 0, 5)}} || titre du chap --}}
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            @auth
            <div class="container custom mb-5">
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
            @endauth
            
            <div class="container custom">
                <div class="row">
                    @if (Session::has('danger'))
                        <div class="alert alert-danger wow fadeIn animated hover-up mb-30 text-center alert-dismissible" role="alert"> 
                            {{ Session::get('danger') }}
                            <a href="" class="btn-close"></a>
                        </div>
                    @endif
                    @guest
                    <div class="alert alert-danger wow fadeIn animated hover-up mb-30 text-center alert-dismissible" role="alert"> 
                        Connectez vous pouvoir laissé(e) un commentaire
                    </div>
                    @endguest

                    @forelse ($comments as $comment)
                    <div class="row pt-5">
                        <div class="col-md-12 wow fadeIn animated hover-up mb-30">
                            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column">
                                    <strong class="d-inline-block mb-2 text-primary"> {{ $comment->user->pseudo}} </strong>
                                    <div class="col-md">
                                        <p>{{$comment ->content}}</p>
                                    </div>
                                    <div class="mb-1 text-muted">{{ $comment->created_at->diffForHumans()}}</div>
                                </div>
                                @if ($comment->user_id === Auth::id())
                                <div class="">
                                    <button role="button" wire:click.prevent='deleteComment({{ $comment->id}})' class="btn btn-danger float-right">Supprimer</button>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="alert alert-dark text-center mt-5">
                        Soigner le premier a commenter
                    </div>
                    @endforelse
                </div>
            </div>
            
        </section>
</main>


    <script>
        window.addEventListener('refresh-page', event => {
            window.location.reload(false); 
            })
    </script>

    {{-- le titre de la page du composant --}}
    @push('title')
    <title>{{ $pageTitle }}</title>
    @endpush


</div>