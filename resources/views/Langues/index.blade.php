@extends('layouts.app')

@section('title', 'Gestion des Langues')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="card-title">
                        <i class="fas fa-language"></i>
                        Liste des Langues
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('langues.create') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-plus"></i> Nouvelle Langue
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Message de succès -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="icon fas fa-check"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Tableau des langues -->
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Code</th>
                                
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($langues as $langue)
                            <tr>
                                <td>{{ $langue->id_langue }}</td>
                                <td>{{ $langue->nom_langue }}</td>
                                <td>
                                    <span class="badge badge-info">{{ $langue->code_langue }}</span>
                                </td>
                                
                                <td class="d-flex justify-content-center align-items-center gap-2">
                                    <a href="{{ route('langues.show', $langue) }}" 
                                       class="btn btn-outline-primary btn-lg mx-1" 
                                       title="Voir les détails" style="border-radius:8px;">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('langues.edit', $langue) }}" 
                                       class="btn btn-outline-warning btn-lg mx-1"
                                       title="Modifier" style="border-radius:8px;">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('langues.destroy', $langue) }}" 
                                          method="POST" 
                                          style="display:inline-block; margin:0 4px;"
                                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette langue ?')">
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
                                <td colspan="6" class="text-center text-muted">
                                    <i class="fas fa-info-circle"></i>
                                    Aucune langue trouvée
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