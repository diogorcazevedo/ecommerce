<?php

namespace ecommerce\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use ecommerce\Repositories\UserRepository;
use ecommerce\Models\User;

/**
 * Class UserRepositoryEloquent
 * @package namespace ecommerce\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }


    /**
     * get deliverman
     */

    public function getdeliveryman()
    {
        return $this->model->where(['role'=>'deliveryman'])->lists('name','id');

    }

}
