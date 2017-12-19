<?php

namespace App\Http\Controllers\Admin\News;

use App\Model\Image as Media;
use App\Model\News;
use App\Model\NewsCategory;
use App\Model\Tags;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{
    public function index()
    {
        $news_list = News::paginate(15);
        return view('adminlte.news.index')
            ->with('news_list', $news_list);
    }

    public function create()
    {
        return view('adminlte.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
                               'name' => 'required',
                               'slug' => 'required|unique:' . (new News())->getTable(),
                           ]);
        $news = News::create($request->all());
        $news->save();
        return redirect()->route('admin.news.edit', $news->id);
    }

    public function edit($id)
    {
        $news       = News::find($id);
        $categories = NewsCategory::get()->toTree();

        if ($news) {
            return view('adminlte.news.edit', compact('news', 'categories'));
        }
        abort(404);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
                               'name' => 'required',
                           ]);
        //dd($request->all());
        $news = News::find($id);
        if ($news) {
            $news->fill($request->all());
            $news->update();
            return back()->with('success', 'Update Success');
        }
        return back()->withErrors(['msg' => 'Không xác định']);
    }

    public function destroy()
    {

    }

    public function ajax(Request $request, $id)
    {
        $request->validate([
                               'act' => 'required'
                           ]);
        $news = News::find($id);
        if ($news) {
            switch ($request->input('act')) {
                case "add_category":
                    $checked     = $request->input('checked');
                    $category_id = $request->input('category_id');
                    if ($checked == 'true') {
                        $news->attachCategory($category_id);
                    } else {
                        $news->detachCategory($category_id);
                    }
                    break;
                    break;
                case "add_tag":
                    $tag_id = $request->input('tag_id');
                    $check  = $news->tags()->where('id', $tag_id)->first();
                    if (!$check) {
                        $tag = Tags::find($tag_id);
                        $tag->news()->save($news);
                    }
                    return response()->json(['status' => true]);
                    break;
                case "delete_tag":
                    $tag_id = $request->input('tag_id');
                    $tag    = Tags::find($tag_id);
                    $tag->news()->detach($news);
                    return response()->json(['status' => true]);
                    break;
                case "load_tag":
                    $tags = $news->tags;
                    return response()->view('adminlte.news.partials.tags', compact('tags'));
                    break;
                case "upload":
                    if ($request->has('photos')) {
                        $files      = $request->file('photos');
                        $image_list = array();
                        foreach ($files as $file) {
                            //upload file and save
                            $image = $this->upload($file);
                            $news->images()->save($image);
                            $image_list[] = $image;
                        }
                        return response()->json($news->images);
                    }
                    break;
                case "load_images":
                    $images = $news->images;
                    return view('adminlte.news.partials.images', compact('images'));
                    break;
                case "modal_image":
                    if ($request->has('image_id')) {
                        $media = Media::find($request->input('image_id'));
                        if ($media) {
                            return response()->view('adminlte.news.partials.modal-image',
                                                    compact('media'));
                        }
                    }
                    break;
                case "set_featured":
                    if ($request->has('image_id')) {
                        $media = Media::find($request->input('image_id'));
                        if ($media) {
                            $news->featured()->associate($media);
                            $news->save();
                            return response()->json(['status' => true]);
                        }
                    }
                    break;
                case "image_delete":
                    if ($request->has('image_id')) {
                        Media::find($request->input('image_id'))->delete();
                    }
                    break;
            }
        }
    }

    private function upload($file)
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

    private function insertImage($name, $file, $medium, $small)
    {
        //save data
        $media         = new Media();
        $media->name   = $name;
        $media->file   = $file;
        $media->medium = $medium;
        $media->small  = $small;
        return $media;
    }
}
