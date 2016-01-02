<?php

namespace ecommerce\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Product extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable =[
        'category_id',
        'colection_id',
        'name',
        'description',
        'price',
        'featured',
        'store',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function colection()
    {
        return $this->belongsTo(Colection::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopeFeatured($query)
    {
        return  $query->where('featured','=',1);
    }

    public function scopeRecommended($query)
    {
        return  $query->where('recommended','=',1);
    }

    public function scopeOfCategory($query,$type)
    {
        return $query->where('category_id','=',$type);

    }

    public function scopeOfColection($query,$type)
    {
        return $query->where('colection_id','=',$type);

    }

}
