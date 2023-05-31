<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks';

    protected $guarded = [];

    //Relationship
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }


}
