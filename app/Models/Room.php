<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'rooms';

    public function status(){
        return $this->belongsTo(RoomStatus::class,'status_id','id');
    }
    public function type(){
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
    public function images(){
        return $this->hasMany(ImageRoom::class);
    }
}
