<?php

namespace ecommerce\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use ecommerce\Repositories\ProductRepository;
use ecommerce\Models\Product;

/**
 * Class ProductRepositoryEloquent
 * @package namespace ecommerce\Repositories;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{


    public function lists()
    {
        return $this->model->get(['id','name','price']);
    }
    
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
