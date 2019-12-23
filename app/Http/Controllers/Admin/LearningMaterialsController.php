<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LearningMaterialRequest;
use App\LearningMaterial;

class LearningMaterialsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {   
        $lms = LearningMaterial::orderby('id', 'desc')->paginate(5);
        return view('admin.documents.index')->with('documents', $lms);
    }

    public function create()
    {
        return view('admin.documents.create');
    }
    
    public function getCategories()
    {   
        return LearningMaterial::select("category")->distinct()->get();
    }

    public function showAll()
    {
        $lms = LearningMaterial::orderby('id', 'desc')->paginate(16);
        $categories = $this->getCategories();

        return view('learning-materials.index')->with(['documents' => $lms, 'categories' => $categories]);
    }

    public function showAllInCategory($category)
    {
        $lms = LearningMaterial::whereCategory($category)->paginate(16);
        $categories = $this->getCategories();
        return view('learning-materials.index')->with(['documents' => $lms, 'categories' => $categories]);
    }

    public function upload(LearningMaterialRequest $request)
    {
        $category = $request->input('category');
        $filePath = $request->file('document')->store("public/documents/$category");
        $filePath = str_replace("public/", "", $filePath);

        $filename = $request->input('title');

        $user = $request->user()->name;
        $lm = new LearningMaterial([
            'title' => $filename,
            'document_url' => $filePath,
            'category' => $category,
            'uploaded_by' => $user
        ]);

        $lm->save();

        return back()->with('status', "Document upload successful");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $url = "storage/".$request->input('url');
        if($request->has(['id', 'url']))
        {
            if(file_exists($url)){
                unlink($url);
            }

            LearningMaterial::whereId($id)->delete();
            return redirect()->back()->with('status', "Document has been deleted");
        }

        return redirect()->back()->with('error', "There was an error, try again");
    }
}
