<div>
    {{-- <style>
            nav svg{
        height: 30px;
        }
        nav .hidden{
            display: block;
        }
    </style> --}}
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ route('home.index')}}" rel="nofollow">Accueil</a>
                    <span></span> Modif de Chapitre
                    {{-- <span></span> Your Cart --}}
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        Modification du chapitres
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.chapters')}}" class="btn btn-success float-end"> Tous les Chapitres</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (Session::has('success'))
                                    <div class="alert alert-success text-center">{{Session::get('success') }} </div>
                                @endif
                                <form wire:submit.prevent="ChaptersEdit">
                                    <div class="mb-3 mt-3">
                                        <label for="mangas" class="form-label"> Mangas</label>
                                        <select class="form-control" name="manga_id" id="mangas" wire:model="manga_id">
                                            <option value="">{{__('Associe un Manga')}}</option>
                                            @forelse ($mangas as $manga)
                                            <option value="{{ $manga->id }}">{{$manga->title}}</option>
                                            @empty
                                            <option value="">Aucun Manga pour le moment</option>
                                            @endforelse
                                        </select>
                                        
                                        @error('manga_id')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-label">Image de couverture</label>
                                        <input type="file" name="chapter_cover" class="form-control" wire:model="new_chapter_cover"/>
                                        @if ($new_chapter_cover)
                                            <img src="{{$new_chapter_cover->temporaryUrl()}}" alt="20">
                                        @else
                                            <img src="{{asset('assets/imgs/chapters/covers')}}/{{$chapter_cover}}" width="20"/>
                                        @endif
                                        @error('new_chapter_cover')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3 mt-3">
                                        <label for="chapter_number" class="form-label"> Chapitre</label>
                                        <input type="text" name="chapter_number" class="form-control" placeholder="Le chapter_number" wire:model='chapter_number' />
                                        @error('chapter_number')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="title" class="form-label"> Le Titre</label>
                                        <input type="text" name="title" class="form-control" placeholder="Le title" wire:model='title' />
                                        @error('title')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" name="content" class="form-control" wire:model="new_content" multiple />
                                        @if ($new_content)
                                        <img src="{{$new_content->temporaryUrl()}}" width="20"/>                                        
                                        @else
                                        <img src="{{asset('assets/imgs/chapters')}}/{{$content}}" width="20" alt="">
                                        @endif

                                        @error('content')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror

                                    </div>
                                        
                                    
                                    <button type="submit" class="btn btn-secondary float-end">Modifier</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
