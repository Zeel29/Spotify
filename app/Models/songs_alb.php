<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class songs_alb extends Model
{
    public $table='albums_songs';
    public $primaryKey='id';
    public $timestamps=false;
    use HasFactory;
}
