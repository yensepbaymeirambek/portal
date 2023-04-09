<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'supervisor_id'
    ];

    public function clients(): HasManyThrough
    {
        return $this->hasManyThrough(
            Client::class,
            GroupClients::class,
            'group_id',
            'id',
            'id',
            'client_id'
        );
    }
}
