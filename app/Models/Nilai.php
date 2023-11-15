<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table = 'testResult';
    protected $primaryKey = 'id';
    protected $fillable = [
        "datapokok_id",
        "akademik",
        "test_membaca_al_quran",
        "status",
    ];

    public function datapokok()
    {
        return $this->belongsTo(Datapokok::class, 'datapokok_id');
    }

}
