<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventFormRequest;

class EventsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'admin'])->except(['all', 'details']);
    }
    /**
     * Display a listing of the resource to admin/executive.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderby('id', 'desc')->paginate(10);
        return view('admin.events.index')->with('events', $events);
    }

    public function unPublished()
    {
        $events = Event::whereStatus("pending")->orderby('id', 'desc')->paginate(15);
        return view('shared.fragments.events')->with('events', $events);
    }

    /**
     * Display a listing of the resource to member.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $events = Event::whereStatus('published')->orderby('id', 'desc')->paginate(20);
        return view('events.index')->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventFormRequest $request)
    {
        $filePath = $request->file('banner')->store("public/gallery/Events");
        $filePath = str_replace("public/", "", $filePath);

        $event = new Event(array(
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'publisher' => $request->input('publisher'),
            'contact' => $request->input('contact'),
            'venue' => $request->input('venue'),
            'banner' => $filePath,
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
        ));

        if ($request->filled('status')) {
                $event->status = $request->input('status');
        }

        if ($request->filled('promo_status')) {
                $event->promo_status = $request->input('promo_status');
        }
        $event->save();
        return redirect()->back()->with('status', "Event has been created");
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $event = Event::whereSlug($slug)->firstOrFail();
        return view('admin.events.show')->with('event', $event);
    }

    /**
     * Display the specified resource to user.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function details($slug)
    {
        $event = Event::whereSlug($slug)->firstOrFail();
        $event->views += 1;
        $event->save();
        return \view('events.show')->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $event = Event::whereSlug($slug)->firstOrFail();
        return view('admin.events.edit')->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventFormRequest $request, $slug)
    {
        $event = Event::whereSlug($slug)->firstOrFail();
        
        $inputs = $request->except(['_method', '_token']);
        foreach($inputs as $key=>$value){
            if($request->filled($key)){
                $event->$key = $value;
            }
        }
        // $event->title = $request->input('title');
        // $event->content = $request->input('content');
        // $event->publisher = $request->input('publisher');
        // $event->venue = $request->input('venue');
        // $event->contact = $request->input('contact');
        // if($request->filled(['start_date', 'end_date'])){
        //     $event->start_date = $request->input('start_date');
        //     $event->end_date = $request->input('end_date');
        // }

        // if(!empty($request->input('status'))){
        //     $event->status = $request->input('status');
        // }

        $event->save();

        return redirect()->back()->with('status', "Event has been updated");
    }

    /**
     * Approve an event.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function publish($id)
    {
        $event = Event::whereId($id)->firstOrFail();
        $event->status = 'published';

        $event->save();

        return redirect()->back()->with('status', "Event has been approved");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $slug = $request->input('slug');
        Event::whereSlug($slug)->delete();
        return redirect()->back()->with('status', "Event was deleted");
    }
}
