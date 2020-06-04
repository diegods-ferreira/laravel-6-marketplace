<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasSlug;
    
    protected $fillable = [
        'name', 'description', 'slug'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
        // Por padrão, o Laravel busca uma tabela contendo o nome dos models
        // separados por um underline em ordem alfabética. Então, nesse caso,
        // ele iria buscar category_products mesmo. Caso, a tabela não possuisse
        // esse nome, bastaria encaminhar o nome dela, como segundo parametro
        // do método belongsToMany(Model::class, 'nome_da_tabela').
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
