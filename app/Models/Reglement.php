<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reglement extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the operation that owns the Reglement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function operation()
    {
        return $this->belongsTo(Operation::class);
    }

    /**
     * Get the mode_paiement that owns the Reglement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mode_paiement()
    {
        return $this->belongsTo(ModePaiement::class);
    }
}
