<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class gallery extends Model
{
    
    use HasFactory;

    public $table = 'gallery';
  
    protected $fillable = [
        'item_id','image' ,'photo_orders'
    ];

    protected $hidden =[
        
    ];

    public function item_details(){
        return $this->belongsTo(itemDetails::class,'item_id','id');
    }
}
