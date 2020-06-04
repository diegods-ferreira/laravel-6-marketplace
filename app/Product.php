<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasSlug;
    
    /*
    O Laravel já tenta procurar sozinho uma tabela no banco de dados, cujo nome seja o nome do model no plural.
    Mas caso eu queira definir o nome da table,a basta utilizar o atributo $table.
    protected $table = 'stores';
    */
    protected $fillable = [
        'name', 'description', 'body', 'price', 'slug'
    ];


    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
        // Por padrão, o Laravel busca uma tabela contendo o nome dos models
        // separados por um underline em ordem alfabética. Então, nesse caso,
        // ele iria buscar category_products mesmo. Caso, a tabela não possuisse
        // esse nome, bastaria encaminhar o nome dela, como segundo parametro
        // do método belongsToMany(Model::class, 'nome_da_tabela').
    }

    public function photos()
    {
        return $this->hasMany(ProductPhoto::class);
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
