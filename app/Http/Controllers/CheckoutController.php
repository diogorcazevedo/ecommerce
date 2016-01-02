<?php

namespace ecommerce\Http\Controllers;


use ecommerce\Events\CheckoutEvent;
use ecommerce\Http\Requests;
use ecommerce\Http\Requests\CheckoutRequest;
use ecommerce\Models\Order;
use ecommerce\Models\OrderItem;
use ecommerce\Repositories\CategoryRepository;
use ecommerce\Repositories\OrderRepository;
use ecommerce\Repositories\ProductRepository;
use ecommerce\Repositories\UserRepository;
use ecommerce\Services\OrderService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PHPSC\PagSeguro\Items\Item;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;


class CheckoutController extends Controller
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
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var OrderService
     */
    private $service;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;


    public function __construct(
                                    OrderRepository $repository,
                                    UserRepository $userRepository,
                                    ProductRepository $productRepository,
                                    OrderService $service,
                                    CategoryRepository $categoryRepository
                                    )

    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
        $this->service = $service;
        $this->categoryRepository = $categoryRepository;
    }


    public function index()
    {
        $clientId= $this->userRepository->find(Auth::user()->id)->client->id;

        $orders = $this->repository->scopeQuery(function($query) use($clientId){
                    return $query->where('client_id','=',$clientId);
        })->paginate();
        $orders->setPath('order');

        return view('customers/order/index',compact('orders'));

    }

    public function create()
    {

        $products =  $this->productRepository->lists();
        return view('customers/order/create',compact('products'));

    }

    public function store(CheckoutRequest $request)
    {
        $data = $request->all();
        $clientId = $this->userRepository->find(Auth::user()->id)->client->id;
        $data['client_id'] = $clientId;
        $this->service->create($data);

        return redirect()->route('customer.order.index');
    }


    public function place(Order $orderModel, OrderItem $orderItem,CheckoutService $checkoutService)
    {
        if (!Session::has('cart')) {
            return false;
        }
        $cart = Session::get('cart');
        $categories = $this->categoryRepository->all();

        if ($cart->getTotal() > 0) {


            $checkout = $checkoutService->createCheckoutBuilder();

            $order = $orderModel->create(['client_id' => Auth::user()->id, 'total' => $cart->getTotal()]);

            foreach ($cart->all() as $k => $item):

                $checkout->addItem(new Item($k, $item['name'],number_format($item['price'],2,'.',''),$item['qtd']));
                $order->items()->create(['product_id' => $k, 'price' => $item['price'], 'qtd' => $item['qtd']]);
                $product= $this->productRepository->find($k);
                -- $product->store;
                $product->save();
            endforeach;


            $cart->clear();
            event(new CheckoutEvent(Auth::user(),$order));


            $response = $checkoutService->checkout($checkout->getCheckout());

            return redirect($response->getRedirectionUrl());


        }

        return view('store.checkout', ['cart' => 'empty','categories'=>$categories]);
    }


}
