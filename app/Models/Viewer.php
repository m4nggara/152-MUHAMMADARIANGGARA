<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Viewer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'viewers';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'ip',
        'user_agent',
        'item_id',
        'user_admin',
        'previous_url',
        'updated_at',
        'deleted_at',
        'created_by',
        'updated_by',
        'deleted_by',
        'slug'
    ];

    protected $hidden = [
        'id',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }
}
