@extends('layouts.app')

@section('title', 'Modifier mon contenu')

@section('content')
<div class="container" style="max-width:600px;margin:40px auto;">
    <h2 style="text-align:center;color:#e63946;font-weight:800;margin-bottom:24px;">Modifier mon contenu</h2>
    <form action="{{ route('contenus.update', $contenu->id_contenu) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre', $contenu->titre) }}" required>
        </div>
        <div class="form-group">
            <label for="texte">Contenu</label>
            <textarea class="form-control" id="texte" name="texte" rows="6" required>{{ old('texte', $contenu->texte) }}</textarea>
        </div>
        <div class="form-group">
            <label for="media">Média (image, audio ou vidéo)</label>
            <input type="file" name="media" id="media" class="form-control">
            @if($contenu->medias && count($contenu->medias))
                <div class="media-preview" style="margin-top:10px;">
                    @foreach($contenu->medias as $media)
                        @if(str_starts_with($media->chemin, 'uploads/medias'))
                            <img src="{{ asset('storage/' . $media->chemin) }}" alt="media" style="max-width:120px;max-height:120px;border-radius:8px;">
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
        <button type="submit" class="btn btn-info" style="width:100%;margin-top:18px;">Enregistrer les modifications</button>
    </form>
</div>
@endsection
