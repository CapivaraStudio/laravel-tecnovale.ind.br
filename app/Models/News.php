<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
  protected $table = 'news';
  use HasFactory;

  public function setTitleAttribute($value)
  {
    $this->attributes['title'] = $value;
    $this->attributes['slug']  = Str::slug($value);
  }

  public function images()
  {
    return $this->hasMany(NewsImage::class, 'news', 'id');
  }
}
