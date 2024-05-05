<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{
    use HasFactory;

    protected $table = "fecha";

    protected $primaryKey = 'id_fch';

    protected $fillable = ['fecha','id_pub'];
}
