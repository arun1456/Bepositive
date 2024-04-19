<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';
    protected $fillable = ['district_id','city_name'];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
}
