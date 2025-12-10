@extends('layouts.user')

@section('title', 'Gestion des Rôles')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="card-title">
                        <i class="fas fa-user-tag"></i>
                        Liste des Rôles
                    </h3>
                    <div class="card-tools d-flex justify-content-end mb-3">
                        <a href="{{ route('roles.create') }}" class="btn btn-primary btn-lg" style="font-weight:600; border-radius:8px;">
                            <i class="fas fa-plus"></i> NOUVEAU RÔLE
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

                    <table class="table table-bordered table-hover" style="background:#fff;">
                        <thead style="background:#1a365d; color:#fff;">
                            <tr>
                                <th style="width:60px;">ID</th>
                                <th>Nom du Rôle</th>
                                <th style="width:220px; text-align:center;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($roles as $role)
                            <tr>
                                <td>{{ $role->id_role }}</td>
                                <td>
                                    <span class="badge badge-secondary" style="background-color:#1a365d; color:#fff; font-size:1em; padding:6px 16px; border-radius:8px;">{{ $role->nom_role }}</span>
                                </td>
                                <td class="d-flex justify-content-center align-items-center gap-2">
                                    <a href="{{ route('roles.show', $role) }}" 
                                       class="btn btn-outline-primary btn-lg mx-1" 
                                       title="Voir les détails" style="border-radius:8px;">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('roles.edit', $role) }}" 
                                       class="btn btn-outline-warning btn-lg mx-1"
                                       title="Modifier" style="border-radius:8px;">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('roles.destroy', $role) }}" 
                                          method="POST" 
                                          style="display:inline-block; margin:0 4px;"
                                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce rôle ?')">
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
                                <td colspan="4" class="text-center text-muted">
                                    <i class="fas fa-info-circle"></i>
                                    Aucun rôle trouvé
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