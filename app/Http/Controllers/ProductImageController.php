<?php

namespace ecommerce\Http\Controllers;


use ecommerce\Http\Requests;
use ecommerce\Http\Requests\ProductRequest;
use ecommerce\Models\ProductImage;
use ecommerce\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use ecommerce\Http\Requests\ProductImageRequest;

class ProductImageController extends Controller
{

    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {

        $this->productRepository = $productRepository;
    }

    public function index($id)
    {

        $product = $this->productRepository->find($id);

        return view('admin.images.index', compact('product'));
    }

    public function createImage($id)
    {

        $product = $this->productRepository->find($id);

        return view('admin.images.create_image', compact('product'));
    }


    public function storeImage(ProductImageRequest $request, $id, ProductImage $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $productImage::create(['product_id' => $id, 'extension' => $extension]);

        Storage::disk('public_local')->put($image->id . '.' . $extension, File::get($file));

        return redirect()->route('admin.images.index', ['id' => $id]);
    }

    public function destroyImage(ProductImage $productImage, $id)
    {

        $image = $productImage->find($id);

        if(file_exists(public_path().'/uploads/'.$image->id . '.' . $image->extension)){
            Storage::disk('public_local')->delete($image->id . '.' . $image->extension);
        }

        $product = $image->product;
        $image->delete();

        return redirect()->route('admin.images.index', ['id' => $product->id]);
    }
}
