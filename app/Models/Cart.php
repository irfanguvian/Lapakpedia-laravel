<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $table = 'cart';

    protected $fillable = [
        'user_id','item_id','item_name',
        'QTY','harga_total',
    ];

    protected $hidden =[
        
    ];

    
    public function item_detail(){
        return $this->belongsTo(itemDetails::class,'item_id','id');
    }

    public function gallery(){
        return $this->belongsTo(gallery::class,'item_id','item_id');
    }

    
    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }

   
}
