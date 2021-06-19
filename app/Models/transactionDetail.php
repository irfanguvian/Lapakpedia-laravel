<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class transactionDetail extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
         'user_id' ,'nama',
        'alamat','provinsi','kota','jasa_pengiriman',
        'pembayaran'
    ];

    protected $hidden =[
        
    ];

    public function users(){
        return $this->belongsTo(itemDetails::class,'user_id','id');
    }
    
   
}
