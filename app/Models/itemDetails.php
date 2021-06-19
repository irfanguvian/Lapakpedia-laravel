<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class itemDetails extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function discountPrice(){
        return number_format(($this->harga) * ( ( 100 - ($this->diskon)) / 100), 0 , ',' , '.');
    }

    protected $fillable = [
        'category','item_name','QTY','harga','diskon' ,'slug' ,'description'
    ];

    protected $hidden =[
        
    ];

    public function gallery(){
        return $this->hasMany(gallery::class,'item_id','id');
    }

   public function shoppingCart(){
        return $this->hasMany(shoppingCart::class,'item_id','id');
    }
}
