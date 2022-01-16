<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prevision extends Model
{
    protected $table = 'ventes_previsions';
    use HasFactory;

    protected $fillable = ['code','quantite'];
}
