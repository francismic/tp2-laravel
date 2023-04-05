<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Etudiant;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $etudiants = Etudiant::all();
        foreach ($etudiants as $etudiant) {
            DB::table('users')->insert([
                'name' => $etudiant->nom,
                'email' => $etudiant->email,
                'password' => Hash::make('password'), // ou utilisez une fonction pour générer un mot de passe aléatoire
                'etudiant_id' => $etudiant->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
