<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\User;
use App\Event;
use App\ContactUs;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserFormRequest;
use App\Position;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $users = User::orderby('id', 'desc')->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::get();
        return view('admin.users.add')->with('roles', $roles);
    }

    public function dashboard()
    {
        $users_count = User::all()->count();
        $posts_count = Post::all()->count();

        $events_count = Event::all()->count();
        $messages_count = ContactUs::all()->count();

        $roles = Role::get();
        $counts = ['no_users' => $users_count, 'post_count' => $posts_count, 
        'events' => $events_count, 'messages' => $messages_count, 'roles' => $roles];

        $posts = Post::whereStatus('pending')->get();

        $events = Event::whereStatus('pending')->get();

        return \view('dashboard')->with(['sums' => $counts, 'posts' => $posts,
        'events' => $events]);
    }

    public function editUser($id)
    {
        $toEdit = User::whereId($id)->firstOrFail();
        $roles = Role::get();

        return view('admin.users.edit', compact('toEdit', 'roles'));
    }

    public function editProfile()
    {
        $toEdit = Auth::user();
        $roles = Role::get();

        return view('admin.index', compact('toEdit', 'roles'));
    }

    public function store(UserFormRequest $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->student_id = $request->input('student_id');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        if($request->has('position'))
            $user->position = $request->input('position');

        if(!empty($request->input('about')))
            $user->about = $request->input('about');

        if ($request->hasFile("avatar")){
            $filename = str_replace("/", "-", $request->input('student_id'));
            $request->file('avatar')->storeAs('public/avatars', $filename.".jpg");
        }

        $role = $request->input('role');

        if(isset($role)){
            $theRole = Role::whereId($role)->firstOrFail();
            $user->assignRole($theRole); 
        }
        $user->save();
        return redirect()->back()->with('status', "User has been created");
    }

    public function update(UserFormRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->student_id = $request->input('student_id');
        $user->email = $request->input('email');

        if(!empty($request->input('password'))){
            $user->password = $request->input('password');
        }
        if($request->has('position'))
            $user->position = $request->input('position');

        if($request->has('about')){
            $user->about = $request->input('about');
        }

        if ($request->hasFile("avatar")){
            $filename = str_replace("/", "-", $request->input('student_id'));
            $request->file('avatar')->storeAs('public/avatars', $filename.".jpg");
        }
        
        $user->save();

        $role = $request->input('role');
        if(isset($role)){
            $user->syncRoles($role);
        }

        return redirect()->back()->with('status', "User details updated");
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
        $role = $request->input('role');
        
        if(isset($role)){
            $user->syncRoles($role);
        }

        return redirect()->back()->with('status', "User details updated");
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        
        User::whereId($id)->delete();
        return redirect()->back()->with('status', 'The user was deleted successfully');
    }
}
