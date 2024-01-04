<?php

namespace App\Models;

use App\Models\ChaletImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function images(){
        return $this->hasMany(ChaletImage::class);
    }
}
