<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guarda extends Model
{
    use HasFactory;

    protected $table = "guarda";

    protected $primaryKey = ['id_us', 'id_pub'];

    public $incrementing = false;

    protected $fillable = ['id_us','id_pub'];
}
