<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class songs extends Model
{
    public $table='songs';
    public $primaryKey='s_id';
    public $timestamps=false;
    use HasFactory;
   
    public function albums()
    {
        return $this->belongsToMany(albumss::class, 'albums_songs', 'songs_s_id', 'albumss_a_id');
    }
}
