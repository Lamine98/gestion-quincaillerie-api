<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonApprovisionnements extends Model
{
    use HasFactory; 
    // protected $table = ['bon_approvisionnements'];
    
    protected $guarded = [];

    /**
     * Get the fournisseur that owns the BonApprovisionnements
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }

    /**
     * The articles that belong to the BonApprovisionnements
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'bon_approvisionnements_articles', 'bon_a_id', 'article_id')->withPivot('quantite');;
    }
}
