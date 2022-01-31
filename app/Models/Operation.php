<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;

    protected $guarded= [];


    /**
     * Get the livreur that owns the Operation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function livreur()
    {
        return $this->belongsTo(Livreur::class);
    }

    /**
     * Get the client that owns the Operation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Get the construction that owns the Operation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function construction()
    {
        return $this->belongsTo(Construction::class);
    }

    /**
     * Get all of the reglement for the Operation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reglement()
    {
        return $this->hasMany(Reglement::class);
    }

    /**
     * The articles that belong to the Operation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'operations_articles', 'operation_id', 'article_id')->withPivot('quantite');
    }
}
