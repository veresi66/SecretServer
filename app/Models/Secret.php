<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secret extends Model
{
    use HasFactory;

    protected $table = 'secrets';
    protected $primaryKey = 'hash';
    protected $keyType = 'string';

    protected $fillable = [
        'hash',
        'secretText',
        'createdAt',
        'expiresAt',
        'reamingViews'
    ];

    protected $casts = [
        'hash' => 'string',
        'secretText' => 'string',
        'createdAt' => 'datetime',
        'expiresAt'=> 'datetime',
        'reamingViews' => 'integer'
    ];

    protected $attributes = [
        'reamingViews' => false,
    ];

    public $timestamps = false;
}
