<?php

namespace ecommerce\Http\Controllers;


use ecommerce\Http\Requests;
use ecommerce\Repositories\ColectionRepository;
use ecommerce\Repositories\ProductRepository;
use ecommerce\Repositories\CategoryRepository;
use ecommerce\Http\Requests\AdminProductRequest;

class ProductsController extends Controller
{

    /**
     * @var ProductRepository
     */
    private $repository;
    /**
     * @var ColectionRepository
     */
    private $colectionRepository;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;




    public function __construct(ProductRepository $repository,
                                CategoryRepository $categoryRepository,
                                ColectionRepository $colectionRepository)

    {
        $this->repository = $repository;
        $this->colectionRepository = $colectionRepository;
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
        $colections =  $this->colectionRepository->lists();


        return view('admin/products/create',compact('colections','categories'));

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
        $colections =  $this->colectionRepository->lists();

        return view('admin/products/edit',compact('product','categories','colections'));
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
