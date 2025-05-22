<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class forgetPasswordController extends Controller
{
    public function forgetpass(Request $request){

        $request->validate([
         'email' => "required|email|exists:users,email"

   ]);
      $token = Str::random(64);

        // Supprimer les anciens tokens s'il y en a
        DB::table('password_resets')->where('email', $request->email)->delete();

        // Insérer le nouveau token
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        // Tu peux envoyer ce token à ton frontend React pour en faire ce que tu veux (ex: envoyer l'email via frontend)
        return response()->json([
            'message' => 'Token généré avec succès.',
            'token' => $token
        ], 200);

    }
}
