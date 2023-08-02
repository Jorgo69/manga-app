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
                    <span></span> Les Chapitres
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
                                        Les Chapitres
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.add.chapters')}}" class="btn btn-success float-end"> Ajout de nouvelles chapitres </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (Session::has('success'))
                                    <div class="alert alert-success text-center" role="alert">
                                        {{ Session::get('success')}}
                                    </div>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Couverture </th>
                                            <th>Titre </th>
                                            <th>Chapitres</th>
                                            <th> Le Scan </th>
                                            <th>Auteur </th>
                                            <th>Genre</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                            $i = ($chapters->currentPage() -1) * ($chapters->perPage());
                                        @endphp
                                        @forelse ($chapters as $chapter)
                                        <tr>
                                            <td>{{++ $i}}</td>
                                            <td> <img src="{{ asset('assets/imgs/mangas')}}/{{$chapter->manga->cover_image}}" width="20" alt="{{$chapter->title}}"></td>
                                            <td> {{substr($chapter->title, 0 ,22)}} ...</td>
                                            <td> {{$chapter->chapter_number}}</td>
                                            <td> <img src="{{$chapter->content}}" alt="" width="45"></td>
                                            {{-- <td>{{ $chapter->author->nom }} {{ $chapter->author->pseudo }}</td> --}}
                                            <td>
                                                @if ($chapter->author)
                                                {{$chapter->author->pseudo}}
                                            @else
                                                Aucun auteur associé
                                            @endif
                                            </td>
                                            {{-- <td>{{ $chapter->genre->name }}</td> --}}
                                            <td>
                                                @if ($chapter->genre)
                                                {{$chapter->genre->name}}
                                            @else
                                                Aucun genre associé
                                            @endif
                                            </td>
                                                
                                            <td>
                                                <a type="button" href="" class="text-info">Voir</a>
                                                <a type="button" href="{{ route('admin.edit.chapters', ['chapters_id' => $chapter->id])}}" class="text-info">Modifier</a>
                                                <a href="#" onclick="deleteConfirmation(id})" class="text-danger mx-2">Supprimer</a>
                                            </td>
                                        </tr>
                                        @empty
                                            Aucune Categories
                                        @endforelse
                                    </tbody>
                                </table>
                                {{$chapters->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<div class="modal" id="deleteConfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="pb-3">Voudrez vous vraiment y continuer?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Annuler </button>
                        <button type="button" class="btn btn-danger" onclick="deleteCategory()">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- @push('script')
    <script>
        function deleteConfirmation(id)
        {
            @this.set('category_id', id);
            $('#deleteConfirmation').modal('show');
        }
        function deleteCategory()
        {
            @this.call('deleteCategory');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush --}}