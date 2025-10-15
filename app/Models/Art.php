<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    protected $table = 'arts';
    protected $fillable = ['title', 'image_path', 'art_type'];
    /** @use HasFactory<\Database\Factories\ArtFactory> */
    use HasFactory;
}
