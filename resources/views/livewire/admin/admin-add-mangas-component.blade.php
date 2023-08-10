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
                                <form wire:submit.prevent="MangasAdd">
                                    <div class="mb-3 mt-3">
                                        <label for="title" class="form-label"> Le Titre</label>
                                        <input type="text" name="title" value="titre" class="form-control" placeholder="Le title" wire:keyup='SlugGenerate' wire:model='title' />
                                        @error('title')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="description" class="form-label">La Description</label>
                                        <textarea name="description" value="descr" id="description" class="form-control"  rows="3" wire:model="description"></textarea>
                                        @error('description')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" name="slug" class="form-control" placeholder="Le slug" wire:model="slug" />
                                        @error('slug')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" name="cover_image" class="form-control" wire:model="cover_image"/>
                                        @if ($cover_image)
                                            <img src="{{$cover_image->temporaryUrl()}}" width="120"/>
                                        @endif
                                        @error('cover_image')
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

                                    {{-- <div class="mb-3 mt-3">
                                        <label for="genre" class="form-label"> Genre</label>
                                        <select class="form-control multiselect" name="genre[]" id="genre" wire:model="selectedGenres" >
                                            <option value="">{{__('Attribuer un genre')}}</option>
                                            @forelse ($genres  as $genre)
                                            <option value="{{ $genre->id}}">{{$genre->name}}</option>
                                            @empty
                                            <option value="">Aucun Genre pour le moment</option>
                                            @endforelse
                                        </select>
                                        @error('genre')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div> --}}

                                    <div class="mb-3 mt-3">
                                        <label for="">Sélectionnez vos fruits préférés :</label>
                                        @forelse ($genres  as $genre)
                                        <div class="">
                                          <input class="form-check-input" name="genre[]" wire:model="selectedGenres" type="checkbox" value="{{ $genre->id}}" id="{{$genre->id}}">
                                          <label class="form-check-label" for="fruit1">{{$genre->name}}</label>
                                          @empty
                                            <option value="">Aucun Genre pour le moment</option>
                                            @endforelse
                                        </div>
                                      </div>
                                    
                                    <button type="submit" class="btn btn-primary float-end">Creer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
