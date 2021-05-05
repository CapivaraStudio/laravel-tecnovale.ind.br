<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
  protected $table = 'products';
  use HasFactory;

  public function setNameAttribute($value)
  {
    $this->attributes['name'] = $value;
    $this->attributes['slug']  = Str::slug($value);
  }

  public function images()
  {
    return $this->hasMany(ProductImage::class, 'product', 'id');
  }

  public function category()
  {
    return $this->belongsTo(Category::class, 'category', 'id');
  }
}
