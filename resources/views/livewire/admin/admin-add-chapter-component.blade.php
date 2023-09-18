<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ route('home.index')}}" rel="nofollow">Accueil</a>
                    <span></span> Ajout de Chapitre
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
                                        Ajouter de nouvelles Chapitre
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.chapters')}}" class="btn btn-success float-end"> Tous les Chapitre</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (Session::has('success'))
                                    <div class="alert alert-success text-center">{{Session::get('success') }} </div>
                                @endif
                                <form wire:submit.prevent="ChaptersAdd">
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
                                        <input type="file" name="chapter_cover" class="form-control" wire:model="chapter_cover"/>
                                        @if ($chapter_cover)
                                            <img src="{{$chapter_cover->temporaryUrl()}}" width="120"/>
                                        @endif
                                        @error('chapter_cover')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="chapter_number" class="form-label"> Chapitre</label>
                                        {{-- @dd($this->chapterNumber()) --}}
                                        <input type="text" name="chapter_number"  class="form-control" wire:keyup='generate' wire:model='chapter_number' />
                                        @error('chapter_number')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="title" class="form-label"> Le Titre</label>
                                        <input type="text" name="title" value="titre" class="form-control" placeholder="Le title" wire:keyup='generateSlug' wire:model='title' />
                                        @error('title')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="slug" class="form-label">Le Slug</label>
                                        <input type="text" name="slug" class="form-control" placeholder="Le slug" wire:model="slug" readonly />
                                        @error('slug')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="slug" class="form-label">Le Chapter Slug</label>
                                        <input type="text" name="chapterSlug" class="form-control" placeholder="Le chapterSlug" wire:model="chapterSlug" readonly />
                                        @error('slug')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-label">Planches</label>
                                        <input type="file" name="contents" class="form-control p-2" wire:model="contents" multiple/>
                                        @if ($contents)
                                            @foreach ($contents as $key => $content )
                                            <img src="{{$content->temporaryUrl()}}" width="120"/>                                                
                                            @endforeach
                                        @endif
                                        @error('contents')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
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
