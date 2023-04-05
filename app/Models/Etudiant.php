<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'adresse',
        'phone',
        'email',
        'birthday',
        'ville_id'
    ];

    public function etudiantHasVille()
    {
        return $this->hasOne(Ville::class, 'id', 'ville_id');
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function blog()
    {
        return $this->hasOne(BlogPost::class);
    }
    
    protected static function boot()
    {
        parent::boot();

        static::created(function ($etudiant) {
            $user = new User([
                'name' => $etudiant->nom,
                'email' => $etudiant->email,
                'password' => bcrypt('password'), // MDP DEFAULT
                'etudiant_id' => $etudiant->id
            ]);
            $user->save();
        });
    }
}
