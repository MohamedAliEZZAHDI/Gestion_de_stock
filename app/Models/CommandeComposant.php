<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeComposant extends Model
{
    protected $table = 'commande_composant';
    protected $fillable = ['quantite_commander','stock_restant'];
    use HasFactory;
}
