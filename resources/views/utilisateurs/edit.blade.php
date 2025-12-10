@extends('layouts.user')

@section('title', 'Modifier l\'Utilisateur')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-warning">
                <header class="header">
                    <div class="header-left">
                        <img src="{{ asset('adminlte/img/benin-logo.png') }}" alt="Logo Benin" class="header-logo">
                        <div class="header-title">
                            PORTAIL CULTUREL DU BENIN<br>
                            <span style="font-size:0.85em; font-weight:normal;">RÉPUBLIQUE DU BENIN</span>
                        </div>
                        <nav class="header-nav">
                            <a href="#">Arts vivants</a>
                            <a href="#">Arts visuels</a>
                            <a href="#">Livres</a>
                            <a href="#">Patrimoine</a>
                            <a href="#">Agenda</a>
                            <a href="#">Publication</a>
                        </nav>
                    </div>
                    <div class="header-actions">
                        <button class="header-btn">Mon espace</button>
                        <div class="header-search">
                            <svg width="20" height="20" fill="#0a2840" viewBox="0 0 20 20"><circle cx="9" cy="9" r="7" stroke="#0a2840" stroke-width="2" fill="none"/><line x1="15" y1="15" x2="19" y2="19" stroke="#0a2840" stroke-width="2"/></svg>
                        </div>
                        <button class="header-lang">FR</button>
                    </div>
                </header>
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        Modifier l'Utilisateur : {{ $utilisateur->prenom }} {{ $utilisateur->nom }}
                    </h3>
                </div>
                <form action="{{ route('utilisateurs.update', $utilisateur) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nom">Nom *</label>
                                    <input type="text" 
                                           class="form-control @error('nom') is-invalid @enderror" 
                                           id="nom" 
                                           name="nom" 
                                           value="{{ old('nom', $utilisateur->nom) }}"
                                           required>
                                    @error('nom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="prenom">Prénom *</label>
                                    <input type="text" 
                                           class="form-control @error('prenom') is-invalid @enderror" 
                                           id="prenom" 
                                           name="prenom" 
                                           value="{{ old('prenom', $utilisateur->prenom) }}"
                                           required>
                                    @error('prenom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                            <div class="form-group">
                                <label for="role">Rôle *</label>
                                <input type="text" name="role" id="role" class="form-control @error('role') is-invalid @enderror" value="{{ old('role', $utilisateur->role) }}" required>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email', $utilisateur->email) }}"
                                   required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="mot_de_passe">Nouveau mot de passe</label>
                            <input type="password" 
                                   class="form-control @error('mot_de_passe') is-invalid @enderror" 
                                   id="mot_de_passe" 
                                   name="mot_de_passe" 
                                   placeholder="Laisser vide pour ne pas changer">
                            @error('mot_de_passe')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                Minimum 6 caractères. Laisser vide pour conserver l'actuel.
                            </small>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sexe">Sexe *</label>
                                    <select name="sexe" class="form-control @error('sexe') is-invalid @enderror" required>
                                        <option value="homme" {{ old('sexe', $utilisateur->sexe) == 'homme' ? 'selected' : '' }}>Homme</option>
                                        <option value="femme" {{ old('sexe', $utilisateur->sexe) == 'femme' ? 'selected' : '' }}>Femme</option>
                                    </select>
                                    @error('sexe')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="date_inscription">Date d'inscription *</label>
                                    <input type="date" 
                                           class="form-control @error('date_inscription') is-invalid @enderror" 
                                           id="date_inscription" 
                                           name="date_inscription" 
                                           value="{{ old('date_inscription', $utilisateur->date_inscription) }}"
                                           required>
                                    @error('date_inscription')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="date_naissance">Date de naissance</label>
                                    <input type="date" 
                                           class="form-control @error('date_naissance') is-invalid @enderror" 
                                           id="date_naissance" 
                                           name="date_naissance" 
                                           value="{{ old('date_naissance', $utilisateur->date_naissance) }}">
                                    @error('date_naissance')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_role">Rôle *</label>
                                    <select name="id_role" class="form-control @error('id_role') is-invalid @enderror" required>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id_role }}" {{ old('id_role', $utilisateur->id_role) == $role->id_role ? 'selected' : '' }}>
                                                {{ $role->nom_role }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_langue">Langue *</label>
                                    <select name="id_langue" class="form-control @error('id_langue') is-invalid @enderror" required>
                                        @foreach($langues as $langue)
                                            <option value="{{ $langue->id_langue }}" {{ old('id_langue', $utilisateur->id_langue) == $langue->id_langue ? 'selected' : '' }}>
                                                {{ $langue->nom_langue }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_langue')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="statut">Statut</label>
                            <input type="text" 
                                   class="form-control @error('statut') is-invalid @enderror" 
                                   id="statut" 
                                   name="statut" 
                                   value="{{ old('statut', $utilisateur->statut) }}"
                                   placeholder="Ex: Actif, Inactif, En attente...">
                            @error('statut')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="photo">Photo (URL)</label>
                            <input type="text" 
                                   class="form-control @error('photo') is-invalid @enderror" 
                                   id="photo" 
                                   name="photo" 
                                   value="{{ old('photo', $utilisateur->photo) }}"
                                   placeholder="Ex: https://example.com/photo.jpg">
                            @error('photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save"></i> Modifier l'utilisateur
                        </button>
                        <a href="{{ route('utilisateurs.index') }}" class="btn btn-default">
                            <i class="fas fa-arrow-left"></i> Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection