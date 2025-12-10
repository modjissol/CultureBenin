@extends('layouts.user')

@section('title', 'Gestion des Régions')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="card-title">
                        <i class="fas fa-map-marker-alt"></i>
                        Liste des Régions
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('regions.create') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-plus"></i> Nouvelle Région
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

                    <table class="table table-bordered table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                               
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($regions as $region)
                            <tr>
                                <td>{{ $region->id_region }}</td>
                                <td>
                                    <strong>{{ $region->nom_region }}</strong>
                                    @if($region->description)
                                        <br><small class="text-muted">{{ Str::limit($region->description, 50) }}</small>
                                    @endif
                                </td>
                               
                               
                               
                                <td class="d-flex justify-content-center align-items-center gap-2">
                                    <a href="{{ route('regions.show', $region) }}" 
                                       class="btn btn-outline-primary btn-lg mx-1" 
                                       title="Voir les détails" style="border-radius:8px;">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('regions.edit', $region) }}" 
                                       class="btn btn-outline-warning btn-lg mx-1"
                                       title="Modifier" style="border-radius:8px;">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('regions.destroy', $region) }}" 
                                          method="POST" 
                                          style="display:inline-block; margin:0 4px;"
                                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette région ?')">
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
                                    Aucune région trouvée
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