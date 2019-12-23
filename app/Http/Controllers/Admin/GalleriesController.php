<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ImageUploadRequest;

class GalleriesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin'])->except(['showAll', 'showAllInCategory']);
    }
    public function index()
    {   
        $images = Image::orderby('id', 'desc')->paginate(5);
        return view('admin.gallery.index')->with('images', $images);
    }

    public function create()
    {
        return view('admin.gallery.create');
    }
    public function getCategories()
    {   
        return Image::select("category")->distinct()->get();
    }

    public function showAll()
    {
        $images = Image::orderby('id', 'desc')->paginate(8);
        $categories = $this->getCategories();

        return view('gallery.index')->with(['images' => $images, 'categories' => $categories]);
    }

    public function showAllInCategory($category)
    {
        $images = Image::whereCategory($category)->paginate(8);
        $categories = $this->getCategories();
        return view('gallery.index')->with(['images' => $images, 'categories' => $categories]);
    }

    public function upload(ImageUploadRequest $request)
    {
        $category = $request->input('category');
        $filePath = $request->file('image')->store("public/gallery/$category");
        $filePath = str_replace("public/", "", $filePath);

        $filename = $request->input('image-name');

        $user = $request->user()->name;
        $img = new Image([
            'image_name' => $filename,
            'image_url' => $filePath,
            'category' => $category,
            'uploaded_by' => $user
        ]);

        $img->save();

        return back()->with('status', "Image upload successful");
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $url = "storage/".$request->input('url');
        if($request->has(['id', 'url']))
        {
            if(file_exists($url)){
                unlink($url);
            }

            Image::whereId($id)->delete();
            return redirect()->back()->with('status', "Image has been deleted");
        }

        return redirect()->back()->with('error', "There was an error, try again");
    }
}
