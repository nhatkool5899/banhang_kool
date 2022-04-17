<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    public $timestamp = false;
    protected $fillable = [
        'payment_method', 'payment_status'
    ];
    protected $primaryKey = 'payment_id';
    protected $table = 'tbl_payment';
}
