<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;


    protected $guarded = [];

    /**
     * Get all of the bon_approvisionnement for the Fournisseur
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bon_approvisionnement()
    {
        return $this->hasMany(BonApprovisionnements::class);
    }
}
