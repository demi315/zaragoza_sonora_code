<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $table = 'comentario';

    protected $primaryKey = 'id_com';

    protected $fillable = ['contenido', 'id_pub', 'id_us'];
}
