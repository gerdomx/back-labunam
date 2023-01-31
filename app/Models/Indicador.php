<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    use HasFactory;
    protected $table = "iframes";
    
    protected $fillable = [
        'categoria_id',
        'categoria',
        'iframe',
        'uuid',
        'masinfo_secc1',
        'masinfo_secc2',
    ];
}
