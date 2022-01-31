<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModePaiement extends Model
{
    use HasFactory;

    protected $table = "mode_paiements";

    protected $guarded = [];

    /**
     * Get all of the versement for the ModePaiement
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function versement()
    {
        return $this->hasMany(Versement::class);
    }

    /**
     * Get all of the reglement for the ModePaiement
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reglement()
    {
        return $this->hasMany(Reglement::class);
    }


}
