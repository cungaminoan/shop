<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
      "id",
      "name",
      "code",
      "slug",
      "info",
      "describer",
        "image",
        "price",
        "feature",
        "state",
        "categories_id",
    ];

    public function category(){
        return $this->belongsTo(Category::class,"categories_id","id");
    }
}
