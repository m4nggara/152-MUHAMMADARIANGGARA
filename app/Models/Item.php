<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'items';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'desc',
        'img_path_banner',
        'owner',
        'phone',
        'email',
        'address',
        'google_maps',
        'category_id',
        'created_at',
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

    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function userBy(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function viewers(): HasMany
    {
        return $this->hasMany(Viewer::class, 'item_id', 'id');
    }

    public function scopeProduct(Builder $query): void
    {
        $query->where('category_id', '=', 1);
    }

    public function scopeDestination(Builder $query): void
    {
        $query->where('category_id', '=', 2);
    }

    public function scopeViewer(Builder $query): int
    {
        return $query->join('viewers', 'items.id', '=', 'viewers.item_id')->where('items.id','=', $this->id)->count();
    }
}
