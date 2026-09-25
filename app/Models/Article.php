<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'slug',
        'category_id',
        'desc',
        'image',
    ];

    protected $casts = [
        'image' => 'array',
    ];
    
    public function category()
    {
        return $this->belongsTo(ArticleCategory::class, 'category_id');
    }


}
