<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Utilisateur;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed'
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->input('password'));
        }

        $oldEmail = $user->email;
        $user->update($data);

        // Update corresponding Utilisateur if exists (match by old email)
        $util = Utilisateur::where('email', $oldEmail)->first();
        if ($util) {
            // parse name into prenom / nom
            $name = $user->name;
            $prenom = '';
            $nom = $name;
            if ($name && strpos($name, ' ') !== false) {
                $parts = explode(' ', $name);
                $prenom = array_shift($parts);
                $nom = implode(' ', $parts) ?: $prenom;
            }
            $util->update([
                'prenom' => $prenom,
                'nom' => $nom,
                'email' => $user->email
            ]);
        }

        return redirect()->route('profile.edit')->with('success', 'Profil mis à jour avec succès.');
    }
}
