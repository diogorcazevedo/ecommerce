<?php

namespace ecommerce\Http\Controllers;


use ecommerce\Models\Category;
use ecommerce\Http\Requests;
use ecommerce\Models\Colection;
use ecommerce\Models\Product;


class LayoutController extends Controller
{

    /**
     * @var Product
     */
    private $product;
    /**
     * @var Category
     */
    private $category;
    /**
     * @var Colection
     */
    private $colection;

    public function __construct(Product $product, Category $category, Colection $colection)
    {

        $this->product = $product;
        $this->category = $category;
        $this->colection = $colection;
    }
    public function index()
    {

        $products =$this->product->all();
        $categories = $this->category->all();
        $colections = $this->colection->all();

        return view('layout.index',compact('categories','colections','products'));
   }
}
