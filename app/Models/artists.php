<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artists extends Model
{
    public $table='artists';
    public $primaryKey='art_id';
    public $timestamps=false;
    use HasFactory;
}
