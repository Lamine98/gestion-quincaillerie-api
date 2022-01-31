<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livreur extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get all of the operation for the Livreur
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function operation()
    {
        return $this->hasMany(operation::class);
    }
}
