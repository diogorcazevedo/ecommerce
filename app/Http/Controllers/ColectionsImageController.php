<?php

namespace ecommerce\Http\Controllers;


use ecommerce\Http\Requests;
use ecommerce\Models\ColectionImage;
use ecommerce\Models\ProductImage;
use ecommerce\Repositories\ColectionRepository;
use ecommerce\Repositories\ProductRepository;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use ecommerce\Http\Requests\ColectionImageRequest;

class ColectionsImageController extends Controller
{


    /**
     * @var ColectionRepository
     */
    private $colectionRepository;
    /**
     * @var ColectionImage
     */
    private $colectionImage;

    public function __construct(ColectionRepository $colectionRepository,ColectionImage $colectionImage)
    {


        $this->colectionRepository = $colectionRepository;
        $this->colectionImage = $colectionImage;
    }

    public function index($id)
    {

        $colection = $this->colectionRepository->find($id);

        return view('admin.colectionsimage.index', compact('colection'));
    }

    public function createImage($id)
    {

        $colection = $this->colectionRepository->find($id);

        return view('admin.colectionsimage.create_image', compact('colection'));
    }


    public function storeImage(ColectionImageRequest $request, $id)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $this->colectionImage->create(['colection_id' => $id, 'extension' => $extension]);

        Storage::disk('public_colection')->put($image->id . '.' . $extension, File::get($file));

        return redirect()->route('admin.colectionsimage.index', ['id' => $id]);
    }

    public function destroyImage($id)
    {

        $image = $this->colectionImage->find($id);

        if(file_exists(public_path().'/uploads/colections/'.$image->id . '.' . $image->extension)){
            Storage::disk('public_colection')->delete($image->id . '.' . $image->extension);
        }

        $colection = $image->colection;
        $image->delete();

        return redirect()->route('admin.colectionsimage.index', ['id' => $colection->id]);
    }
}
