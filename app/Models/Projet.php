<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

    protected $table = "projet_constructions";

    protected $fillable = ['etat', 'adresse', 'date_demarrage', 'client_id'];

    /**
     * Get the client that owns the Projet
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clients()
    {
        return $this->belongsTo(Client::class);
    }
}
