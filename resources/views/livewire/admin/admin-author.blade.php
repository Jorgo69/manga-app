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
                    <span></span> Les Categories
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
                                        Les Categories
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.add.authors')}}" class="btn btn-success float-end"> Ajout de nouveau Auteurs </a>
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
                                            <th>Nom </th>
                                            <th>Prenom </th>
                                            <th>Pseudo ?</th>
                                            <th>Numero </th>
                                            <th>Email </th>
                                            <th>Localisation </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                            $i = ($authors->currentPage() -1) * ($authors->perPage());
                                        @endphp
                                        @forelse ($authors as $author)
                                        <tr>
                                            <td>{{++ $i}}</td>
                                            <td> {{$author->nom}}</td>
                                            <td> {{$author->prenom}}</td>
                                            <td> {{$author->pseudo}}</td>
                                            <td> {{$author->numero}}</td>
                                            <td> {{$author->email}}</td>
                                            <td> {{$author->localisation}}</td>
                                            {{-- <td> Action</td> --}}
                                                
                                            <td>
                                                <a type="button" href="" class="text-info">Voir</a>
                                                <a type="button" href="{{ route('admin.authors.edit', ['authors_id' => $author->id])}}" class="text-info">Modifier</a>
                                                <a href="#" onclick="deleteConfirmation({{$author->id}})" class="text-danger mx-2">Supprimer</a>
                                            </td>
                                        </tr>
                                        @empty
                                            Aucune Categories
                                        @endforelse
                                    </tbody>
                                </table>
                                {{$authors->links()}}
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
                        <button type="button" class="btn btn-danger" onclick="deleteAuthor()">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('deleteScript')
    <script>
        function deleteConfirmation(id)
        {
            @this.set('authors_id', id);
            $('#deleteConfirmation').modal('show');
        }
        function deleteAuthor()
        {
            @this.call('deleteAuthor');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush