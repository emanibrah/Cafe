<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Drink;

class Category extends Model
{

    use HasFactory, SoftDeletes;
    protected $fillable =[
        'cate_name',
       
    ];

public function Drinkes()
    {
        return $this->hasMany(Drink::class);
    }

}
