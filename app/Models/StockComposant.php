<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockComposant extends Model
{
    protected $table = 'stock_composants';
    protected $fillable = ['quantite'];

    use HasFactory;
}
