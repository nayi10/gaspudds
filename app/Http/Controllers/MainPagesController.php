<?php

namespace App\Http\Controllers;

use App\User;
use App\LearningMaterial;
use Illuminate\Http\Request;
use App\{ContactUs, Post, Event};
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostFormRequest;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\LearningMaterialRequest;

class MainPagesController extends Controller
{
    public function index()
    {
        return \view('index');
    }

    public function dashboard()
    {
        return \view('user.user');
    }

    public function editProfile()
    {
        $toEdit = Auth::user();

        return view('user.profile', compact('toEdit'));
    }

    public function updateProfile(UserFormRequest $request)
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->student_id = $request->input('student_id');
        $user->email = $request->input('email');

        if(!empty($request->input('password'))){
            $user->password = $request->input('password');
        }

        if($request->has('about')){
            $user->about = $request->input('about');
        }

        if ($request->hasFile("avatar")){
            $filename = str_replace("/", "-", $request->input('student_id'));
            $request->file('avatar')->storeAs('public/avatars', $filename.".jpg");
        }
        
        $user->save();

        return redirect()->back()->with('status', "Your details have been updated");
    }

    public function create()
    {
        return view('user.posts.create');
    }

    public function show(string $slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        return \view('user.posts.show')->with('post', $post);
    }

    public function store(PostFormRequest $request)
    {
        $post = new Post(array(
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'author' => $request->user()->student_id,
            'status' => 'pending',
        ));

        $post->save();
        return redirect()->back()->with('status', 'Post successfully added');
    }

    public function update(PostFormRequest $request, $slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        $post->title = $request->input('title');
        $post->content = $request->input('content');

        $post->save();
        return \redirect()->back()->with('status', 'Post update successful');
    }

    public function edit(string $slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        return \view('user.posts.edit')->with('post', $post);
    }

    public function userPosts()
    {
        $user = Auth::user()->student_id;
        $posts = Post::whereAuthor($user)->orderby('id', 'desc')->paginate(10);

        return \view('user.posts.index')->with('posts', $posts);
    }

    /**
     * Deletes a post from the database
     * @param string $slug The unique slug of the post
     */
    public function destroy(Request $request)
    {
        $slug = $request->input('slug');
        $affectedRows = Post::whereSlug($slug)->delete();
        $msg = ($affectedRows === 1) ? __('alerts.post_deleted'):__('alerts.post_not_deleted');

        return \redirect()->back()->with('status', $msg);
    }

    public function documents()
    {   
        $user = Auth::user()->student_id;
        $lms = LearningMaterial::whereUploadedBy($user)->orderby('id', 'desc')->paginate(5);
        return view('user.documents.index')->with('documents', $lms);
    }

    public function newDocument()
    {
        return view('user.documents.create');
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

    public function deleteDoc(Request $request)
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
