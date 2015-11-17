<?php

namespace ecommerce\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface OrderRepository
 * @package namespace ecommerce\Repositories;
 */
interface OrderRepository extends RepositoryInterface
{
    public function getByIdAndDeliveryman($id,$idDeliveryman);
}
