@extends('layouts.app')

@section('title', 'Créer un Contenu')

@section('content')
<style>
    body, .container-fluid {
        background: linear-gradient(135deg, #f8f8f8 0%, #e63946 100%);
        min-height: 100vh;
    }
    .create-content-card {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 4px 24px rgba(230,57,70,0.10), 0 1.5px 8px rgba(0,0,0,0.08);
        padding: 32px 28px;
        margin: 40px auto;
        max-width: 800px;
    }
    .create-content-card h3 {
        color: #e63946;
        font-size: 2em;
        font-weight: 700;
        margin-bottom: 18px;
        letter-spacing: 1px;
        text-align: center;
    }
    .form-group label {
        color: #a259ff;
        font-weight: 600;
        margin-bottom: 6px;
    }
    .form-control, textarea.form-control {
        border-radius: 8px;
        border: 1.5px solid #e63946;
        box-shadow: 0 1px 4px rgba(230,57,70,0.07);
        font-size: 1em;
        margin-bottom: 10px;
    }
    .form-control:focus, textarea.form-control:focus {
        border-color: #a259ff;
        box-shadow: 0 0 0 2px #a259ff33;
    }
    .card-footer {
        text-align: center;
        background: none;
        border-top: none;
        margin-top: 18px;
    }
    .btn-info {
        background: linear-gradient(90deg,#e63946 60%,#a259ff 100%);
        color: #fff;
        font-weight: bold;
        border-radius: 30px;
        padding: 12px 32px;
        border: none;
        box-shadow: 0 2px 8px rgba(230,57,70,0.12);
        transition: background 0.2s, transform 0.2s;
    }
    .btn-info:hover {
        background: linear-gradient(90deg,#a259ff 0%,#e63946 100%);
        color: #fff;
        transform: scale(1.04);
    }
    .btn-default {
        background: #fff;
        color: #e63946;
        font-weight: bold;
        border-radius: 30px;
        padding: 12px 32px;
        border: 1.5px solid #e63946;
        margin-left: 10px;
        transition: background 0.2s, color 0.2s;
    }
    .btn-default:hover {
        background: #e63946;
        color: #fff;
    }
    .invalid-feedback {
        color: #e63946;
        font-size: 0.95em;
    }
    .form-text.text-muted {
        color: #a259ff;
        font-size: 0.95em;
    }
    @media (max-width: 700px) {
        .create-content-card {padding: 16px 6px;}
        .form-group label {font-size: 1em;}
    }
</style>
<div class="container-fluid">
    <form method="POST" action="{{ route('contribuer.store') }}" enctype="multipart/form-data">
        @csrf
    <div class="form-group">
        <label for="titre">Titre *</label>
        <input type="text" 
               class="form-control @error('titre') is-invalid @enderror" 
               id="titre" 
               name="titre" 
               value="{{ old('titre') }}"
               placeholder="Ex: Les traditions culinaires de la région..."
               required>
        @error('titre')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="texte">Description *</label>
        <textarea class="form-control @error('texte') is-invalid @enderror" 
                  id="texte" 
                  name="texte" 
                  rows="6"
                  placeholder="Décrivez votre contenu ici..."
                  required>{{ old('texte') }}</textarea>
        @error('texte')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <!-- Champs date de création et validation retirés -->

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="region">Région *</label>
                <input type="text" name="region" id="region" class="form-control @error('region') is-invalid @enderror" value="{{ old('region') }}" placeholder="Entrez une région" required>
                <small class="form-text text-muted">Vous pouvez saisir le nom d'une nouvelle région si elle n'existe pas.</small>
                @error('region')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="langue">Langue *</label>
                <input type="text" name="langue" id="langue" class="form-control @error('langue') is-invalid @enderror" value="{{ old('langue') }}" placeholder="Entrez une langue" required>
                <small class="form-text text-muted">Vous pouvez saisir le nom d'une nouvelle langue si elle n'existe pas.</small>
                @error('langue')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="type_contenu">Type de contenu *</label>
                <input type="text" name="type_contenu" id="type_contenu" class="form-control @error('type_contenu') is-invalid @enderror" value="{{ old('type_contenu') }}" placeholder="Entrez un type" required>
                <small class="form-text text-muted">Vous pouvez saisir un nouveau type de contenu si nécessaire.</small>
                @error('type_contenu')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <!-- Champ média supprimé -->
    <!-- Champ auteur retiré -->
    </div>

    <div class="row">
    <!-- Champ contenu parent retiré -->
            <!-- Champ Auteur supprimé -->
    </div>
        <!-- Champs parent/modérateur retirés pour les utilisateurs simples -->

</div>
    <div class="form-group" style="margin-top:24px;">
        <label for="media">Choisir un média</label>
        <input type="file" name="media" id="media" class="form-control @error('media') is-invalid @enderror" accept="image/*,audio/*,video/*">
        @error('media')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
<div class="card-footer">
    <button type="submit" class="btn btn-info">Soumettre</button>
    <a href="{{ route('home') }}" class="btn btn-default">Annuler</a>
</div>
    </form>
        </div>
    </div>
</div>
@endsection