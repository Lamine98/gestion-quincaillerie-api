<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Versement extends Model
{
    use HasFactory;

    protected $guarded = [];


    /**
     * Get the client that owns the Versement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Get the mode_paiement that owns the Versement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mode_paiement()
    {
        return $this->belongsTo(ModePaiement::class);
    }
}
