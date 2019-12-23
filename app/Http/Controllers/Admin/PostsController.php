<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostFormRequest;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'admin'])->except('all', 'details');
    }
    /**
     * This is for the posts viewable by the users
     * Example page: www.site.com/posts
     */
    public function index()
    {
        $posts = Post::orderby('id', 'desc')->paginate(10);

        return \view('admin.posts.index')->with('posts', $posts);
    }

    public function details(string $slug)
    {
        $post = Post::whereStatus('published')->whereSlug($slug)->firstOrFail();
        $mostViewed = Post::where('id', '<>', $post->id)->orderby('views', 'desc')->take(5)->get();
        $post->views += 1;
        $post->save();
        return \view('posts.show')->with(['post' => $post, 'similar' => $mostViewed]);
    }

    public function approve(Request $request)
    {
        $slug = $request->input('slug');
        $post = Post::whereSlug($slug)->firstOrFail();
        $post->status = "published";
        $post->save();

        return redirect()->back()->with('status', "Post has been approved");
    }

    public function all()
    {
        $allPosts = Post::whereStatus('published')->orderby('id', 'desc')->paginate();
        return \view('posts.index')->with('posts', $allPosts);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function show(string $slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        return \view('admin.posts.show')->with('post', $post);
    }

    public function store(PostFormRequest $request)
    {
        $post = new Post(array(
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'author' => $request->user()->student_id,
        ));

        if($request->user()->hasAnyRole(['admin', 'executive'])){
            $post->status = 'published';

            if($request->input('published') == 0){
                $post->status = 'pending';
            }
        }

        $post->save();
        return redirect()->back()->with('status', 'Post successfully added '.$request->input('published'));
    }

    public function update(PostFormRequest $request, $slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->author = $request->user()->student_id;

        if($request->has('promo_status') && !empty($request->input('promo_status'))){
            $post->promo_status = 'promoted';
        }
        
        $post->save();
        return \redirect()->back()->with('status', 'Post update successful');
    }

    public function edit(string $slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        return \view('admin.posts.edit')->with('post', $post);
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
}
