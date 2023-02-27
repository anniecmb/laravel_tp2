<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nom',
        'path_file',
        'user_id',
        'file_name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $table = 'files';
}
