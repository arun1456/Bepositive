<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    protected $table = 'donor';
    protected $fillable = ['donor_name','contact','bgroup_id','city_id'];

    public function bgroup()
    {
        return $this->belongsTo(Bgroup::class, 'bgroup_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
