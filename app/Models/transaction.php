<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transaction extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'transaction';
    protected $fillable = [
         'user_id' ,'username',
        'items','transaction_total','transaction_status'
    ];

    protected $hidden =[
        
    ];

    public function users(){
        return $this->belongsTo(itemDetails::class,'user_id','id');
    }
    
   
}
