<?php

namespace ecommerce\Http\Controllers\Api\Client;


use Illuminate\Http\Request;
use ecommerce\Http\Controllers\Controller;
use ecommerce\Http\Requests;
use ecommerce\Repositories\OrderRepository;
use ecommerce\Repositories\UserRepository;
use ecommerce\Services\OrderService;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class ClientCheckoutController extends Controller
{
    /**
     * @var OrderRepository
     */

    private $repository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var OrderService
     */
    private $service;

    private $with =['client','cupom','items'];


    public function __construct(
                                    OrderRepository $repository,
                                    UserRepository $userRepository,
                                    OrderService $service
                                    )

    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->service = $service;
    }


    public function index()
    {
        $id = Authorizer::getResourceOwnerId();
        $clientId= $this->userRepository->find($id)->client->id;

        $orders = $this->repository
                       ->skipPresenter(false)
                       ->with($this->with)
                       ->scopeQuery(function($query) use($clientId){

        return $query->where('client_id','=',$clientId);
        })->paginate();

        return $orders;

    }


    /**
     * @param Requests\CheckoutRequest $request
     * @return mixed
     * @throws \Exception
     */
    public function store(Requests\CheckoutRequest $request)
    {
        $data = $request->all();
        $id = Authorizer::getResourceOwnerId();
        $clientId = $this->userRepository->find($id)->client->id;
        $data['client_id'] = $clientId;
        $order = $this->service->create($data);
        return $this->repository
                    ->skipPresenter(false)
                    ->with($this->with)
                    ->find($order->id);
    }


    public function show($id)
    {
        return $this->repository
                    ->skipPresenter(false)
                    ->with($this->with)
                    ->find($id);

    }
}
