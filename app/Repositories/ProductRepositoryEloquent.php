<?php

namespace ecommerce\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use ecommerce\Presenters\ProductPresenter;
use ecommerce\Models\Product;


/**
 * Class ProductRepositoryEloquent
 * @package namespace ecommerce\Repositories;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{

protected $skipPresenter=true;

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

    /**
     * Specify Presenter class name
     *
     * @return string
     */
    public function presenter()
    {
        return ProductPresenter::class;
    }


}
