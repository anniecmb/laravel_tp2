<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'titre',
        'body',
        'texte',
        'user_id',
    ];

    // public function blogHasUser() {

    //     // $this réfère à la class BlogPost
    //     //                    model, clé primaire, clé étrangère
    //     return $this->hasOne('App\Models\User', 'id', 'users_id');
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function blogHasCategory() {
    //     return $this->hasOne('App\Models\Category', 'id');
    // }
}
