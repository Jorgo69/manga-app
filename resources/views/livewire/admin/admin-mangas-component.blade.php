<div>
    <style>
            nav svg{
        height: 30px;
        }
        nav .hidden{
            display: block;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ route('home.index')}}" rel="nofollow">Accueil</a>
                    <span></span> Les Mangas
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
                                        Les Mangas
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.add.mangas')}}" class="btn btn-success float-end"> Ajout de nouveau Mangas </a>
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
                                            <th>Images </th>
                                            <th>Titre </th>
                                            <th>Dscription</th>
                                            <th>Auteur </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                            $i = ($mangas->currentPage() -1) * ($mangas->perPage());
                                        @endphp
                                        @forelse ($mangas as $manga)
                                        <tr>
                                            <td>{{++ $i}}</td>
                                            <td> <img src="{{asset('assets/imgs/mangas')}}/{{$manga->cover_image}}" alt="" width="45"></td>
                                            <td> {{$manga->title}}</td>
                                            <td> {{substr($manga->description, 0, 20)}} ...</td>
                                            <td> {{$manga->author->pseudo}}</td>
                                                
                                            <td>
                                                <a type="button" href="" class="text-info">Voir</a>
                                                <a type="button" href="{{ route('admin.edit.mangas', ['mangas_id' => $manga->id])}}" class="text-info">Modifier</a>
                                                <a href="#" onclick="deleteConfirmation(id})" class="text-danger mx-2">Supprimer</a>
                                            </td>
                                        </tr>
                                        @empty
                                            Aucune Categories
                                        @endforelse
                                    </tbody>
                                </table>
                                {{$mangas->links()}}
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