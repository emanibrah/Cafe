<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;

class Drink extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =[
        'title',
        'content',
        'price',
        'puplish',
        'special',
        'image',
        'category_id',
 
    ];
    public function categories(){
        return $this->belongsTo(Category::class);
    }



    

}
