<?php

namespace ecommerce\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use ecommerce\Repositories\CategoryRepository;
use ecommerce\Models\Category;

/**
 * Class CategoryRepositoryEloquent
 * @package namespace ecommerce\Repositories;
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{

    public function lists()
    {
        return $this->model->lists('name','id');
    }
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Category::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
