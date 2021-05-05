<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'products_images';
    use HasFactory;

  public function products()
  {
    return $this->belongsTo(Product::class, 'product', 'id');
  }
}
