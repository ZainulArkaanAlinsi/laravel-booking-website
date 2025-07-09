<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageRoom extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'image_rooms';

    public function Room(){
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
}
