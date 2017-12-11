<?php

namespace App\Http\Controllers\Admin\News;

use App\Model\Image as Media;
use App\Model\News;
use App\Model\NewsCategory;
use App\Model\NewsCategoryList;
use App\Model\NewsTags;
use App\Model\NewsTagsList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class EditController extends Controller
{
    public function get($id)
    {
        $news          = News::find($id);
        $categories    = NewsCategory::getAll();
        $category_list = NewsCategoryList::where('news_id', $id)->pluck('category_id')->toArray();
        $tags_list     = NewsTagsList::where('news_id', $id)->get();
        $images        = Media::where('imageable_id', $id)->get();;
        if ($news) {
            return view('adminlte.news.edit', compact('news', 'categories', 'category_list', 'tags_list', 'images'));
        }
    }

    public function post(Request $request, $id)
    {
        $request->validate([
                               'name' => 'required',
                               'content' => 'required'
                           ]);
        $news = News::find($id);
        if ($news) {
            $news->fill($request->all());
            $news->update();
            return back()->with('success', 'Update Success');
        }
        return back()->withErrors(['msg' => 'Không xác định']);
    }

    /**
     * @param Request $request
     * @param News $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function postTags(Request $request, $id)
    {
        $request->validate([
                               'tags_id' => 'required'
                           ]);
        // check tags exits
        $tags_id   = $request->input('tags_id');
        $news_tags = NewsTagsList::where('tags_id', $tags_id)
            ->where('news_id', $id)->get();
        if ($news_tags->isNotEmpty()) {
            return response()->json(['status' => 'error']);
        }
        $news_tags_list          = new NewsTagsList();
        $news_tags_list->tags_id = $request->input('tags_id');
        $news_tags_list->news_id = $id;
        $news_tags_list->save();
        return response()->json(['status' => 'success', 'data' => NewsTags::find($tags_id)->toArray()]);
    }

    /**
     * @param Request $request
     * @param News $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function postCategory(Request $request, $id)
    {
        $request->validate([
                               'category_id' => 'required',
                               'news_id' => 'required',
                               'action' => 'required'
                           ]);
        if ($request->input('action') == 'delete') {
            NewsCategoryList::where('news_id', $request->input('news_id'))
                ->where('category_id', $request->input('category_id'))
                ->delete();
            return response()->json(['success' => 'đã xóa']);
        }
        $news_category_list              = new NewsCategoryList();
        $news_category_list->category_id = $request->input('category_id');
        $news_category_list->news_id     = $id;
        $news_category_list->save();
        return response()->json(['success' => 'đã thêm']);
    }

    /**
     * @param Request $request
     * @param NewsCategoryList $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function postCategoryPrimary(Request $request, $id)
    {
        $request->validate([
                               'id' => 'required'
                           ]);
        $news_category_list = NewsCategoryList::find($request->input('id'));
        //reset all primary via news_id
        NewsCategoryList::where('news_id', $news_category_list->news_id)->update('primary', '0');

        //set primary for id.
        $news_category_list->primary = 1;
        $news_category_list->update();
        return response()->json(['success' => 'cập nhật']);
    }

    public function postMedia(Request $request, $id)
    {
        if ($request->hasFile('file')) {
            $request->validate([
                                   'file' => 'required|mimes:jpeg,jpg,png'
                               ]);
            $file     = request()->file('file');
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


            //save data
            $media          = new Media();
            $media->name    = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $media->file    = $mediaFile;
            $media->medium  = $mediaMedium;
            $media->small   = $mediaSmall;
            $media->type    = 'news';
            $media->id_type = $id;
            $media->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['không có ảnh', $id]);
    }

    public function mediaList(Request $request, $id)
    {
        $images = Media::where(['id_type' => $id, 'type' => 'news'])->get();
        return response()->view('adminlte.news.partials.medialist', compact('images'));
    }

    public function openMedia(Request $request)
    {
        $id    = $request->input('id');
        $media = Media::find($id);
        if ($media) {
            return response()->view('adminlte.news.partials.media', compact('media'));
        }
    }

    public function setFeatured(Request $request, $id)
    {
        $request->validate([
                               'image_id' => 'required'
                           ]);
        $news = News::find($id);
        if ($news) {
            $news->image_id = $request->input('image_id');
            $news->update();
            return response()->json(['success' => true, 'media' => media($news->media->medium)]);
        }
    }
}
