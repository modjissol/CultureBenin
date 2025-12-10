@extends('layouts.user')

@section('title', 'Contenus en attente de validation')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-warning">
                    <h3 class="card-title">
                        <i class="fas fa-hourglass-half"></i>
                        Contenus en attente
                    </h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="icon fas fa-check"></i>
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Titre</th>
                                <th>Auteur</th>
                                <th>Date création</th>
                                <th>Langue</th>
                                <th>Région</th>
                                <th>Type</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contenus as $contenu)
                            <tr>
                                <td>{{ $contenu->id_contenu }}</td>
                                <td>{{ $contenu->titre }}</td>
                                <td>{{ $contenu->auteur ? $contenu->auteur->prenom . ' ' . $contenu->auteur->nom : '-' }}</td>
                                <td>{{ $contenu->date_creation }}</td>
                                <td>{{ $contenu->langue ? $contenu->langue->nom_langue : '-' }}</td>
                                <td>{{ $contenu->region ? $contenu->region->nom_region : '-' }}</td>
                                <td>{{ $contenu->typeContenu ? $contenu->typeContenu->nom_contenu : '-' }}</td>
                                <td class="d-flex justify-content-center align-items-center gap-2">
                                    <a href="{{ route('contenus.show', $contenu->id_contenu) }}" class="btn btn-outline-primary btn-lg mx-1" title="Voir le détail" style="border-radius:8px;">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="{{ route('admin.contenus.valider', $contenu->id_contenu) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-lg mx-1" onclick="return confirm('Valider ce contenu ?')" style="border-radius:8px;">
                                            <i class="fas fa-check"></i> Valider
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.contenus.refuser', $contenu->id_contenu) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-warning btn-lg mx-1" onclick="return confirm('Refuser ce contenu ?');" style="border-radius:8px;">
                                            <i class="fas fa-times"></i> Refuser
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.contenus.supprimer', $contenu->id_contenu) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-lg mx-1" onclick="return confirm('Supprimer ce contenu ?');" style="border-radius:8px;">
                                            <i class="fas fa-trash"></i> Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">
                                    <i class="fas fa-info-circle"></i>
                                    Aucun contenu en attente
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
