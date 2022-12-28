<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsubcategory extends Model
{
    use HasFactory; 

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'sub_subcategory_name_en',
        'sub_subcategory_name_bn',
        'sub_subcategory_slug_en',
        'sub_subcategory_slug_bn',
    ];
    public function subcategory()
    {
        return $this->belongsTo('App\Models\Subcategory');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
