<?php

namespace App\Http\Controllers\Admin\Product;

use App\Model\Image as Media;
use App\Model\Products;
use App\Model\ProductCategory;
use App\Model\ProductTag;
use App\Model\Size;
use App\Model\Tags;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::orderBy('id', 'desc')->paginate(25);
        return view('adminlte.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminlte.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['slug' => str_slug($request->input('name'))]);
        $request->validate([
                               'name' => 'required|max:191',
                               'slug' => 'required|max:191|unique:table_product'
                           ]);
        $product = Products::create($request->all());
        $product->save();
        return redirect()->route('admin.product.edit', $product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product    = Products::find($id);
        $categories = sort_category(ProductCategory::all());
        if ($product) {
            return view('adminlte.product.edit', compact('product', 'categories'));
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Products::find($id);
        $request->validate([
                               'name' => 'required',
                               'slug' => 'required|unique:' . $product->getTable() . ',slug,' . $id
                           ]);
        $product->fill($request->all());
        $product->update();
        return back()->with('success', __('Update success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function quantity($id)
    {
        $product = Products::find($id);
        if ($product) {
            return view('adminlte.product.quantity', compact('product'));
        }
    }

    public function postMedia(Request $request, $id)
    {
        $product = Products::find($id);

        if ($product) {
            $request->validate([
                                   'type' => 'required',
                                   'photos.*' => 'required|mimes:jpeg,jpg,png'
                               ]);
            if ($request->has('photos')) {
                $files      = $request->file('photos');
                $image_list = array();
                foreach ($files as $file) {
                    //upload file and save
                    $image = $this->upload($file);
                    $product->images()->save($image);
                    $image_list[] = $image;
                }
                return response()->json($product->images);
            }
        }
        return response()->json(['error' => __('ID :id Product Wrong', ['id' => $id])]);

    }

    public function upload($file)
    {
        $name     = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $fileName = rand(1, 999) . ' - ' . $file->getClientOriginalName();
        $pathDate = date('Y/m/');
        $path     = config('constants.uploads') . $pathDate;
        if (!file_exists($path)) {
            Storage::makeDirectory($path);
        }

        $mediaFile   = $pathDate . $fileName;
        $mediaMedium = $pathDate . 'medium-' . $fileName;
        $mediaSmall  = $pathDate . 'small-' . $fileName;
        $pathFile    = config('constants.storage_uploads') . $mediaFile;
        $pathMedium  = config('constants.storage_uploads') . $mediaMedium;
        $pathSmall   = config('constants.storage_uploads') . $mediaSmall;

        //save file
        $image = Image::make($file->getRealPath());
        $image->save($pathFile);

        //save medium
        $image->resize(config('constants.medium')['width'], null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($pathMedium);

        //save small
        //save medium
        $image->resize(config('constants.small')['width'], null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($pathSmall);

        //insert
        return $this->insertImage($name, $mediaFile, $mediaMedium, $mediaSmall);
    }

    public function insertImage($name, $file, $medium, $small)
    {
        //save data
        $media         = new Media();
        $media->name   = $name;
        $media->file   = $file;
        $media->medium = $medium;
        $media->small  = $small;
        return $media;
    }

    public function getPanelImage($id)
    {
        $product = Products::find($id);
        $images  = $product->images;
        if ($product) {
            return response()->view('adminlte.product.partials.images', compact('images'));
        }
    }

    public function getPanelTag($id)
    {
        $product = Products::find($id);
        if ($product) {
            $tags = $product->tags;
            return response()->view('adminlte.product.partials.tags', compact('tags'));
        }
    }

    public function getPanelImageItem($image_id)
    {
        $media = Media::find($image_id);
        if ($media) {
            return response()->view('adminlte.product.partials.imageitem', compact('media'));
        }
    }

    public function getPanelColor($id)
    {
        $product = Products::find($id);
        if ($product) {
            $colors = $product->colors;
            return response()->view('adminlte.product.partials.colors', compact('colors'));
        }
    }

    public function postAddColor(Request $request, $id)
    {
        $product = Products::find($id);
        $image   = $product->images()->where('id', $request->input('image_id'))->first();

        // check image have in product image list
        if ($image) {
            $product->attachColor($image->id);
            return response()->json(['status' => true]);
        }
    }

    public function postColorDelete(Request $request, $id)
    {
        $image_id = $request->input('image_id');
        $product  = Products::find($id);
        if ($product) {
            $product->colors()->detach($image_id);
            return response()->json(['status' => true]);
        }
    }

    public function postColorName(Request $request, $id)
    {
        $image_id = $request->input('image_id');
        $product  = Products::find($id);
        if ($product) {
            $product->colors()->updateExistingPivot($image_id, ['name' => $request->input('name')]);
            return response()->json(['status' => true]);
        }
    }

    public function postAddTag(Request $request, $id)
    {
        $request->validate([
                               'tag_id' => 'required'
                           ]);
        $tag     = ProductTag::find($request->input('tag_id'));
        $product = Products::find($id);
        if ($product && $tag) {
            $product->tags()->attach($tag->id);
            return response()->json(['status' => true]);
        }
    }

    public function postSizeAdd(Request $request, $id)
    {
        $size    = Size::find($request->input('id'));
        $product = Products::find($id);
        if ($product && $size) {
            $product->attachSize($size->id);
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }

    public function postSizeDelete(Request $request, $id)
    {
        $size    = Size::find($request->input('id'));
        $product = Products::find($id);
        if ($product && $size) {
            $product->dettachSize($size->id);
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }

    public function getSizeLoad($id)
    {
        $product = Products::find($id);
        if ($product) {
            $sizes = $product->sizes;
            return response()->view('adminlte.product.partials.sizes', compact('sizes'));
        }
    }

    public function ajax(Request $request, $id)
    {
        $request->validate([
                               'act' => 'required'
                           ]);
        $act     = $request->input('act');
        $product = Products::find($id);
        if ($product) {
            switch ($act) {
                case "size_add":
                    $product->attachSize($request->input('size_id'));
                    return response()->json(['status' => true]);
                    break;
                case "size_delete":
                    $product->detachSize($request->input('size_id'));
                    return response()->json(['status' => true]);
                    break;
                case "set_featured":
                    $image = Media::find($request->input('image_id'));
                    $product->featured()->associate($image);
                    $product->save();
                    return response()->json(['status' => true]);
                    break;
                case "load_featured":
                    $featured = $product->featured;
                    return response()->view('adminlte.product.partials.featured', compact('featured'));
                    break;

                case "add_category":
                    $checked     = $request->input('checked');
                    $category_id = $request->input('category_id');
                    if ($checked == 'true') {
                        $product->attachCategory($category_id);
                    } else {
                        $product->detachCategory($category_id);
                    }
                    break;
                case "add_tag":
                    $tag_id = $request->input('tag_id');
                    $check  = $product->tags()->where('id', $tag_id)->first();
                    if (!$check) {
                        $tag = Tags::find($tag_id);
                        $tag->products()->save($product);
                    }
                    return response()->json(['status' => true]);
                    break;
                    break;
                case "delete_tag":
                    $tag_id = $request->input('tag_id');
                    $tag    = Tags::find($tag_id);
                    $tag->products()->detach($product);
                    return response()->json(['status' => true]);
                    break;
                case "load_tag":
                    $tags = $product->tags;
                    return response()->view('adminlte.product.partials.tags', compact('tags'));
                    break;
            }
        }
    }
}
