<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    public function bill() {
        return $this->belongsTo(Bill::class, 'register_id');
    }

    protected $fillable = [
        'quantity',
        'tome_id',
        'bill_id'
    ];
}
