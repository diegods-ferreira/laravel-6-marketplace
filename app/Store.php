<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Store extends Model
{
    use HasSlug;

    /*
    O Laravel já tenta procurar sozinho uma tabela no banco de dados, cujo nome seja o nome do model no plural.
    Mas caso eu queira definir o nome da table,a basta utilizar o atributo $table.
    */
    protected $table = 'stores';

    protected $fillable = [
        'name', 'description', 'phone', 'mobile_phone', 'slug', 'logo'
    ];


    // Mapeando o relacionamento entre usuário e loja
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
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
