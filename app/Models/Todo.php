<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name'
    ];

    protected static function boot()
    {
        parent::boot();

        return static::addGlobalScope('userScope', function (Builder $builder) {
            $builder->where('user_id', Auth::id());
        });
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
