<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the categorie that owns the Article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    /**
     * The operation that belong to the Article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function operation()
    {
        return $this->belongsToMany(Operation::class,'operations_articles', 'operation_id', 'article_id')->withPivot('quantite');
    }

    public function bons()
    {
        return $this->belongsToMany(BonApprovisionnements::class, 'bon_approvisionnements_articles', 'bon_a_id', 'article_id')->withPivot('quantite');;
    }
}
