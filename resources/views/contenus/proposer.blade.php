@extends('layouts.app')

@section('title', 'Culture Benin')

@section('content')
<style>
    .user-content-card {
        background: #181818;
        border-radius: 18px;
        box-shadow: 0 4px 24px rgba(162,89,255,0.10), 0 1.5px 8px rgba(0,0,0,0.08);
        padding: 32px 28px;
        margin: 40px auto;
        max-width: 480px;
        color: #fff;
    .user-content-card h1 {
        color: #e63946;
        font-size: 2.1em;
        font-weight: 800;
        margin-bottom: 24px;
        letter-spacing: 1px;
        text-align: center;
        display: flex;
        align-items: center;
    <style>
        justify-content: center;
        gap: 16px;
        font-family: 'Montserrat','Segoe UI',sans-serif;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(162,89,255,0.08);
        padding: 10px 0 10px 0;
    }
    .user-content-card h1 img {
        max-width: 32px;
        width: 32px;
        height: 32px;
        object-fit: contain;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.10);
        background: #fff;
        padding: 2px;
    }
    .form-group label {
        color: #a259ff;
        font-weight: 700;
        margin-bottom: 6px;
        font-size: 1.1em;
    }
    .form-control, textarea.form-control {
        border-radius: 8px;
        border: 2px solid #a259ff;
        background: #222;
        color: #fff;
        font-size: 1em;
        margin-bottom: 10px;
        font-family: inherit;
    }
    .form-control:focus, textarea.form-control:focus {
        border-color: #e63946;
        box-shadow: 0 0 0 2px #a259ff33;
        background: #222;
        color: #fff;
    }
    .form-group input[type="file"] {
        background: #f8f8ff;
        border: none;
        padding: 8px;
        color: #fff;
    }
    .media-preview {
        margin: 10px 0 0 0;
        text-align: center;
    }
    .media-preview img, .media-preview video, .media-preview audio {
        max-width: 220px;
        max-height: 180px;
        border-radius: 8px;
        margin: 0 auto;
        display: block;
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
        font-size: 1.1em;
    }
    .btn-info:hover {
        background: linear-gradient(90deg,#a259ff 0%,#e63946 100%);
        color: #fff;
        transform: scale(1.04);
    }
    .btn-default {
        background: #fff;
        color: #a259ff;
        border: 1.5px solid #a259ff;
        border-radius: 30px;
        padding: 12px 32px;
        font-weight: bold;
        margin-left: 10px;
        transition: background 0.2s, color 0.2s;
        font-size: 1.1em;
    }
    .btn-default:hover {
        background: #a259ff;
        color: #fff;
    }
    .invalid-feedback {
        color: #e63946;
        font-size: 0.95em;
    }
    @media (max-width: 700px) {
        .user-content-card {padding: 12px 2px;max-width:98vw;}
        .form-group label {font-size: 1em;}
        .user-content-card h1 {font-size: 1.1em;}
    }
</style>
<div style="min-height:100vh;width:100vw;display:flex;align-items:center;justify-content:center;background:url('/adminlte/img/tri.jpg') center center/cover no-repeat fixed;">
    <div class="user-content-card">
        <h1>
            <img src="{{ asset('adminlte/img/tele.webp') }}" alt="Logo Benin" />
            Culture Benin
        </h1>
        @guest
            <div style="color:#e63946;text-align:center;font-weight:bold;font-size:1.1em;margin:24px 0;">
                Vous devez être connecté pour proposer un contenu.<br>
                <a href="{{ route('login') }}" style="color:#a259ff;text-decoration:underline;">Se connecter</a> ou
                <a href="{{ route('register') }}" style="color:#a259ff;text-decoration:underline;">Créer un compte</a>
            </div>
        @else
        <form action="{{ route('contenus.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="titre">Titre <span aria-label="obligatoire" style="color:#e63946;">*</span></label>
                    <input type="text" class="form-control @error('titre') is-invalid @enderror" id="titre" name="titre" value="{{ old('titre') }}" placeholder="Ex: Un conte, une recette..." required aria-required="true">
                    @error('titre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="texte">Contenu <span aria-label="obligatoire" style="color:#e63946;">*</span></label>
                    <textarea class="form-control @error('texte') is-invalid @enderror" id="texte" name="texte" rows="6" placeholder="Rédigez votre contenu ici..." required aria-required="true">{{ old('texte') }}</textarea>
                    @error('texte')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="region_libre">Région <span aria-label="obligatoire" style="color:#e63946;">*</span></label>
                    <input type="text" name="region_libre" id="region_libre" class="form-control @error('region_libre') is-invalid @enderror" value="{{ old('region_libre') }}" placeholder="Saisissez la région (ex: Zou, Borgou...)" required aria-required="true">
                    @error('region_libre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="langue_libre">Langue <span aria-label="obligatoire" style="color:#e63946;">*</span></label>
                    <input type="text" name="langue_libre" id="langue_libre" class="form-control @error('langue_libre') is-invalid @enderror" value="{{ old('langue_libre') }}" placeholder="Saisissez la langue (ex: Fon, Yoruba...)" required aria-required="true">
                    @error('langue_libre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="type_contenu_libre">Type de contenu <span aria-label="obligatoire" style="color:#e63946;">*</span></label>
                    <input type="text" name="type_contenu_libre" id="type_contenu_libre" class="form-control @error('type_contenu_libre') is-invalid @enderror" value="{{ old('type_contenu_libre') }}" placeholder="Ex: Conte, Recette, Histoire..." required aria-required="true">
                    @error('type_contenu_libre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="media">Média (image, audio ou vidéo)</label>
                    <input type="file" name="media" id="media" class="form-control @error('media') is-invalid @enderror" accept="image/*,audio/*,video/*" aria-label="Ajouter un média">
                    <div class="media-preview" id="media-preview"></div>
                    @error('media')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info">
                    <i class="fas fa-save"></i> Envoyer
                </button>
                <a href="{{ route('contenus.index') }}" class="btn btn-default">
                    <i class="fas fa-arrow-left"></i> Retour
                </a>
            </div>
        </form>
        @endguest
    </div>
</div>
<script>
// Prévisualisation du média sélectionné
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('media');
        const preview = document.getElementById('media-preview');
        if(input) {
            input.addEventListener('change', function(e) {
                preview.innerHTML = '';
                if(this.files && this.files[0]) {
                    const file = this.files[0];
                    const type = file.type;
                    const url = URL.createObjectURL(file);
                    if(type.startsWith('image/')) {
                        preview.innerHTML = `<img src="${url}" alt="Prévisualisation" />`;
                    } else if(type.startsWith('video/')) {
                        preview.innerHTML = `<video src="${url}" controls></video>`;
                    } else if(type.startsWith('audio/')) {
                        preview.innerHTML = `<audio src="${url}" controls></audio>`;
                    } else {
                        preview.innerHTML = `<span style='color:#e63946;'>Fichier sélectionné : ${file.name}</span>`;
                    }
                }
            });
        }
    });
</script>
@endsection
