@extends('layouts.user')

@section('title', 'Gestion des Utilisateurs')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                    <h3 class="card-title">
                        <i class="fas fa-users"></i>
                        Liste des Utilisateurs
                    </h3>
                    <div class="card-tools d-flex justify-content-end mb-3">
                        <a href="{{ route('utilisateurs.create') }}" class="btn btn-primary btn-lg" style="font-weight:600; border-radius:8px;">
                            <i class="fas fa-plus"></i> NOUVEL UTILISATEUR
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="icon fas fa-check"></i>
                            {{ session('success') }}
                               <td><span class="badge badge-info">{{ $utilisateur->role }}</span></td>
                               <th>Rôle</th>
                        </div>
                    @endif

                    <table class="table table-bordered table-hover" style="background:#fff;">
                        <thead style="background:#1a365d; color:#fff;">
                            <tr>
                                <th style="width:60px;">ID</th>
                                <th>Nom & Prénom</th>
                                <th style="width:220px; text-align:center;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($utilisateurs as $utilisateur)
                            <tr>
                                <td>{{ $utilisateur->id_utilisateur }}</td>
                                <td>
                                    <strong>{{ $utilisateur->prenom }} {{ $utilisateur->nom }}</strong>
                                    @if($utilisateur->statut)
                                        <br><small class="text-muted">{{ $utilisateur->statut }}</small>
                                    @endif
                                </td>
                                <td class="d-flex justify-content-center align-items-center gap-2">
                                    <a href="{{ route('utilisateurs.show', $utilisateur) }}" 
                                       class="btn btn-outline-primary btn-lg mx-1" 
                                       title="Voir les détails" style="border-radius:8px;">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('utilisateurs.edit', $utilisateur) }}" 
                                       class="btn btn-outline-warning btn-lg mx-1"
                                       title="Modifier" style="border-radius:8px;">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('utilisateurs.destroy', $utilisateur) }}" 
                                          method="POST" 
                                          style="display:inline-block; margin:0 4px;"
                                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-lg" title="Supprimer" style="border-radius:8px;">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">
                                    <i class="fas fa-info-circle"></i>
                                    Aucun utilisateur trouvé
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

<style>
.badge-pink {
    background-color: #e83e8c;
    color: white;
}
</style>
@endsection