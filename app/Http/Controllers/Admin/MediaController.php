<?php

namespace App\Http\Controllers\Admin;

use App\Model\Image as Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MediaController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $images = Media::orderBy('id', 'desc')->paginate(15);
        return view('adminlte.media.index')
            ->with('images', $images);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('adminlte.media.add');
    }

    public function postAdd(Request $request)
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
            $media         = new Media();
            $media->name   = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $media->file   = $mediaFile;
            $media->medium = $mediaMedium;
            $media->small  = $mediaSmall;
            $media->save();

            return back()->with('status', 'Đã Thêm Ảnh');
        }
        return back()->withErrors(['msg' => 'chọn file']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function getModalMedia(Request $request)
    {
        $id = $request->input('id');
        $media = Media::find($id);
        if($media) {
            return response()->view('adminlte.media.medit', compact('media'));
        }
    }

    public function postEdit(Request $request, $id) {
        $request->validate(['name' => 'required']);
        $media = Media::find($id);
        $media->fill($request->all());
        $media->update();
        return response()->json(['success' => true]);
    }

    public function view($id)
    {
        $media = Media::find($id)->first();
        return view('adminlte.media.view')
            ->with('media', $media);
    }

    public function destroy(Request $request) {
        $request->validate([
            'id' => 'required'
                           ]);
        $media = Media::find($request->input('id'));
        if($media) {
            $media->delete();
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }
}
