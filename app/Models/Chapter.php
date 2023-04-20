<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
      protected $table = 'chapters';
    protected $fillable = [
        'chapter_number', 'verses_count', 'name', 'translation', 'transliteration', 'meaning', 'summary'
    ];
}
