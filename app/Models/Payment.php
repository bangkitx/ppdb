<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected $primaryKey = 'id';
    protected $fillable = [
        'status','amount','status_payment','user_id','snapToken'
    ];


    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Status_payment
    // cancel -3
    // berhasil 2
    // gagal/deny -1
    // expired -2
    // waiting chose payment 0
    // pending 1

    // Status
    // 2 = success
    // 1 = ongoing
    // 0 = waiting chose payment 
    // -1 = failed

}
