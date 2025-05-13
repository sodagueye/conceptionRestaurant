<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class InscriptionController extends Controller
{


    public function inscription(Request $request)
    {
        $utilisateurDonnee = $request->validate([
            'nom' => ['required', 'string', 'min:2', 'max:255'],
            'prenom' => ['required', 'string', 'min:2', 'max:255'],
            'telephone' => ['required', 'string', 'unique:users,telephone'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'max:30', 'confirmed'],

        ]);
        $utilisateurs = User::create([
            'nom' => $utilisateurDonnee['nom'],
            'prenom' => $utilisateurDonnee['prenom'],
            'telephone' => $utilisateurDonnee['telephone'],
            'email' => $utilisateurDonnee['email'],
            'password' => bcrypt($utilisateurDonnee['password']),

        ]);
        return response($utilisateurs, 200);
    }

    public function connexion(Request $request)
    {
        // Validation des données
        $data = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string', 'min:8', 'max:30'],
        ]);

        // Recherche de l'utilisateur
        $utilisateur = User::where('email', $data['email'])->first();

        if (! $utilisateur) {
            // Renvoie toujours 200, mais avec votre message
            return [
                'message' => "Aucun utilisateur trouvé avec l’e-mail {$data['email']}"
            ];
        }

        // 3) Vérification du mot de passe
        if (! Hash::check($data['password'], $utilisateur->password)) {
            return [
                'message' => 'Mot de passe incorrect'
            ];
        }
        $token = $utilisateur->createToken('CLE_SECRETE')->plainTextToken;
        // 4) Succès de la connexion : renvoyez ce que vous voulez (message + utilisateur)
        return [
            'message' => 'Connexion réussie',
            'user'    => $utilisateur,
            ' token' =>  $token
        ];
    }
}
