<?php
/**
 * Created by PhpStorm.
 * User: diogoazevedo
 * Date: 05/11/15
 * Time: 23:51
 */

namespace ecommerce\Http\Controllers;


use ecommerce\Repositories\OrderRepository;
use ecommerce\Repositories\UserRepository;
use ecommerce\Services\OrderService;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    /**
     * @var OrderRepository
     */
    private $repository;
    /**
     * @var OrderService
     */
    private $orderService;
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(OrderRepository $repository , OrderService $orderService, UserRepository $userRepository)
    {

        $this->repository = $repository;
        $this->orderService = $orderService;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $orders = $this->repository->paginate();
        $orders->setPath('orders');

        return view('admin.orders.index',compact('orders'));

    }


    public function edit($id)
    {
        $list_status =$this->orderService->state();
        $order = $this->repository->find($id);
        $deliveryman = $this->userRepository->getdeliveryman();

        return view('admin/orders/edit',compact('order','list_status','deliveryman'));

    }

    public function update(Request $request, $id)
    {
        $all = $request->all();
        $this->repository->update($all,$id);

        return redirect()->route('admin.orders.index');
    }
}