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
                    <span></span> Ajout de Mangas
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
                                        Ajout de nouvelles Caegories
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.mangas')}}" class="btn btn-success float-end"> Tous les Mangas</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (Session::has('success'))
                                    <div class="alert alert-success">{{Session::get('success') }} </div>
                                @endif
                                <form wire:submit.prevent="MangasEdit">
                                    @csrf
                                    <div class="mb-3 mt-3">
                                        <label for="title" class="form-label"> Le Titre</label>
                                        <input type="text" name="title" class="form-control" placeholder="Le title" wire:model='title' />
                                        @error('title')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="description" class="form-label">La Description</label>
                                        <textarea name="description" id="description" class="form-control"  rows="3" wire:model="description"></textarea>
                                        @error('description')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" name="cover_image" class="form-control" wire:model="new_cover_image"/>

                                        @if ($new_cover_image)
                                        <img src="{{$new_cover_image->temporaryUrl()}}" width="120"/>
                                        @else
                                        <img src="{{asset('assets/imgs/mangas')}}/{{$cover_image}}" width="120" alt="">
                                        @endif
                                        @error('new_cover_image')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="auteur" class="form-label"> Auteur</label>
                                        <select class="form-control" name="author_id" id="auteur" wire:model="author_id">
                                            <option value="">{{__('Choisissez un auteur')}}</option>
                                            @forelse ($authors as $author)
                                            <option value="{{ $author->id}}">{{$author->nom}}</option>
                                            @empty
                                            <option value="">Aucun Auteur pour le moment</option>
                                            @endforelse
                                        </select>
                                        @error('author_id')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="genre" class="form-label"> Genre</label>
                                        <select class="form-control" name="genres" id="genre" wire:model="selectedGenres">
                                            <option value="">{{__('Attribuer un genre')}}</option>
                                            @forelse ($genres  as $genre)
                                                <option value="{{ $genre->id}}">{{$genre->name}}</option>
                                            @empty
                                                <option value="">Aucun Genre pour le moment</option>
                                            @endforelse
                                        </select>
                                        @error('selectedGenres')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary float-end">Modifier</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
