@extends('layouts.app')

@section('title', 'Gestion des Contenus')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="card-title">
                        <i class="fas fa-file-alt"></i>
                        Liste des Contenus
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('contenus.create') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-plus"></i> Nouveau Contenu
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="icon fas fa-check"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row">
                        @forelse($contenus as $contenu)
                            <div class="col-md-3 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $contenu->titre }}</h5>
                                        @if($contenu->parent)
                                            <p class="card-text"><small class="text-muted">En réponse à: {{ $contenu->parent->titre }}</small></p>
                                        @endif
                                    </div>
                                    <div class="card-footer bg-white border-0 d-flex justify-content-between">
                                        <a href="{{ route('contenus.show', $contenu) }}" class="btn btn-primary btn-sm" title="Voir les détails">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('contenus.edit', $contenu) }}" class="btn btn-warning btn-sm" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('contenus.destroy', $contenu) }}" method="POST" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce contenu ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Supprimer">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center text-muted">
                                <i class="fas fa-info-circle"></i>
                                Aucun contenu trouvé
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.badge-purple {
    background-color: #6f42c1;
    color: white;
}
</style>
@endsection