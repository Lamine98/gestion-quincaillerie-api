<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the client associated with the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get all of the projet for the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projet()
    {
        return $this->hasMany(Projet::class);
    }

    /**
     * Get all of the versement for the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function versement()
    {
        return $this->hasMany(Versement::class);
    }
}
