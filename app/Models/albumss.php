<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class albumss extends Model
{
    public $table='albumss';
    public $primaryKey='a_id';
    public $timestamps=false;
    use HasFactory;

    public function songs()
    {
        return $this->belongsToMany(songs::class, 'albums_songs', 'albumss_a_id', 'songs_s_id');
    }
}
