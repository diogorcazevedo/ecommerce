<?php

namespace ecommerce\Http\Controllers\Api\Client;



use ecommerce\Http\Controllers\Controller;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;
use ecommerce\Repositories\ProductRepository;

class ClientProductController extends Controller
{


    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(ProductRepository $productRepository)

    {
        $this->productRepository = $productRepository;
    }


    public function index()
    {

        $products = $this->productRepository->skipPresenter(false)->all();
        return $products;

    }
}
