<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chalet extends Model
{
    use HasFactory;
    protected $guarded = [];

    const SIZES = [
        1 => 'كبيرة',
        2 => 'صغيرة'
    ];

    const TYPES = [
        1 => 'عوائل',
        2 => 'عزاب',
    ];

    public function prices()
    {
        return $this->hasMany(ChaletPrice::class, 'chalet_id');
    }
}
