<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BC_Composant extends Model
{
    protected $table = 'bc_composants';
    protected $fillable = ['quantite'];

    use HasFactory;
}
