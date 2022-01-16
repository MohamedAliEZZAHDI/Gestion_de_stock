<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FabricationPF extends Model
{
    protected $table = 'fabrication_pf';
    use HasFactory;
    protected $fillable = [
        'code_pf',
        'quantite',
    ];
}
