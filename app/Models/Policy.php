<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use HasFactory;

    protected $table = 'policy';
    protected $primaryKey = 'id';
    protected $fillable = [
        'perjanjian1','perjanjian2','perjanjian3','perjanjian4','datapokok_id'
    ];

    public function datapokok(){
        return $this->belongsTo(Datapokok::class,'datapokok_id');
    }


}
