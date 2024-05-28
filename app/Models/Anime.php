<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_default',
        'title_english',
        'image_url',
        'trailer_url',
        'score',
        'rank',
        'episodes',
        'summary',
        'url',
        'year',
    ];
}
