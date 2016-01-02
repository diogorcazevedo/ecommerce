<?php

namespace ecommerce\Http\Controllers;

use ecommerce\Models\Category;
use ecommerce\Models\Client;
use ecommerce\Repositories\CategoryRepository;
use ecommerce\Repositories\ClientRepository;
use ecommerce\Repositories\OrderRepository;
use Illuminate\Http\Request;
use ecommerce\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var OrderRepository
     */
    private $orderRepository;
    /**
     * @var ClientRepository
     */
    private $clientRepository;


    public function __construct(CategoryRepository $categoryRepository, OrderRepository $orderRepository, ClientRepository $clientRepository)
    {

        $this->categoryRepository = $categoryRepository;

        $this->orderRepository = $orderRepository;
        $this->clientRepository = $clientRepository;
    }
    public function index()
    {


    }

    public function orders()
    {

            $categories = $this->categoryRepository->all();

             $id =  Auth::user()->id;

             $client = $this->clientRepository->find($id);

             $orders = $client->orders()->get();




            return view('store.orders',compact('orders','categories'));
    }
}
