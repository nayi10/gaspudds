<?php

namespace App\Http\Controllers;

use App\Image;
use App\User;
use App\Event;
use App\Post;
use App\Helpers\AppHelper;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {
        $execUsers = User::whereNotNull('position')->get();
        $gallery = Image::whereNotIn('category', ['Hostels'])->take(4)->get();

        $events = Event::where([
                            ['status', '=', 'published'],
                            ['banner', 'like', 'gallery%'],
                            ['end_date', '>', 'CURRENT_DATE']
                            ])->orderby('views', 'desc')->take(4)->get();

        $promotedEvents = Event::where([
                            ['status', '=', 'published'],
                            ['promo_status', '=', 'promoted'],
                            ['banner', 'like', 'gallery%'],
                            ['end_date', '>', 'CURRENT_DATE']
                            ])->inRandomOrder()->take(4)->get();

        $posts = Post::whereStatus('published')->orderby('created_at', 'desc')
                            ->take(2)->get();

        $about = AppHelper::getJsonFile('about.json');
        return view('index')->with(['executives' => $execUsers, 'gallery' => $gallery,
                            'events' => $events, 'about' => $about, 'posts' => $posts,
                            'promotedEvents' => $promotedEvents]);
    }
}
