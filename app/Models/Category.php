<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;  

    protected $fillable = [
        'category_icon',
        'category_name_en',
        'category_name_bn',
        'category_slug_en',
        'category_slug_bn',
    ];
    public function subcategorys()
    {
        return $this->hasMany('App\Models\Subcategory');
    }

    public function subsubcategorys()
    {
        return $this->hasMany('App\Models\Subsubcategory');
    }
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
