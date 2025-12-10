@extends('layouts.app')

@section('title', 'Traduction')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Traduction pour: {{ $contenu->titre }}</div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('contenus.traduction.store', $contenu) }}">
                        @csrf

                        <div class="form-group">
                            <label for="langue_cible">Langue cible (code ou nom)</label>
                            <select name="langue_cible" id="langue_cible" class="form-control">
                                <option value="">Sélectionner (optionnel)</option>
                                @foreach($langues as $l)
                                    <option value="{{ $l->code_langue }}">{{ $l->nom_langue }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label for="texte_traduit">Texte traduit</label>
                            <textarea name="texte_traduit" id="texte_traduit" rows="8" class="form-control">{{ old('texte_traduit', $contenu->texte) }}</textarea>
                        </div>

                        <div class="mt-3">
                            <button class="btn btn-primary" type="submit">Soumettre la traduction</button>
                            <a href="{{ route('home') }}" class="btn btn-secondary">Retour</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
