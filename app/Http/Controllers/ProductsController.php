<?php

namespace ecommerce\Http\Controllers;


use ecommerce\Http\Requests;
use ecommerce\Repositories\ProductRepository;
use ecommerce\Repositories\CategoryRepository;
use ecommerce\Http\Requests\AdminProductRequest;

class ProductsController extends Controller
{

    /**
     * @var ProductRepository
     */

    private $repository;

    public function __construct(ProductRepository $repository, CategoryRepository $categoryRepository)

    {
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;

    }


    public function index()
    {
        $products= $this->repository->paginate(5);

        $products->setPath('products');

          return view('admin/products/index',compact('products'));

    }

    public function create()
    {
        $categories =  $this->categoryRepository->lists();


        return view('admin/products/create',compact('categories'));

    }

    public function store(AdminProductRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);

        return redirect()->route('admin.products.index');
    }

    public function edit($id)
    {
        $product = $this->repository->find($id);
        $categories =  $this->categoryRepository->lists();

        return view('admin/products/edit',compact('product','categories'));
    }

    public function update(AdminProductRequest $request, $id)
    {
        $data = $request->all();
        $this->repository->update($data,$id);

        return redirect()->route('admin.products.index');
    }

    public function destroy( $id)
    {

        $this->repository->delete($id);

        return redirect()->route('admin.products.index');
    }
}
