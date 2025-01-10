<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produto';

    protected $primaryKey = 'id_produto';

    protected $fillable = ['nome', 'id_categoria', 'valor'];

    public $timestamps = true;
}

