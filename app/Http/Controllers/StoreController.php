<?php

namespace ecommerce\Http\Controllers;


use ecommerce\Models\Category;
use ecommerce\Http\Requests;
use ecommerce\Models\Colection;
use ecommerce\Models\Product;


class StoreController extends Controller
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

        $pFeatured =$this->product->featured()->get();
        $pRecommended =$this->product->recommended()->get();
        $categories = $this->category->all();
        $colections = $this->colection->all();

        return view('store.index',compact('categories','pFeatured','pRecommended','colections'));
   }

    public function category($id)
    {
        $categories = $this->category->all();
        $colections = $this->colection->all();
        $category =$this->category->find($id);
        $products = $this->product->ofCategory($id)->get();

        return view('store.category',compact('categories','category','products','colections'));
    }

    public function colection($id)
    {
        $colections = $this->colection->all();
        $categories = $this->category->all();
        $colection =$this->colection->find($id);
        $products = $this->product->ofColection($id)->get();

        return view('store.colection',compact('colections','colection','products','categories'));
    }

    public function product($id)
    {
        $categories = $this->category->all();
        $colections = $this->colection->all();
        $product = $this->product->find($id);

        return view('store.product',compact('categories','product','colections'));
    }
}
