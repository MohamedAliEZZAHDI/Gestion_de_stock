<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockPF extends Model
{
    protected $table = 'stock_pf';
    protected $fillable = ['quantite'];

    use HasFactory;
}
