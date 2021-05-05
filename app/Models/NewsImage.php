<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsImage extends Model
{
  protected $table = 'news_images';
  use HasFactory;

  public function product()
  {
    return $this->belongsTo(News::class, 'news', 'id');
  }
}
