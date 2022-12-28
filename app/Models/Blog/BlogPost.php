<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog\BlogCategory;

class BlogPost extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function BlogCategory(){
    	return $this->belongsTo(BlogCategory::class,'category_id','id');
    }
}
