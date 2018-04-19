<?php

namespace App\Http\Controllers\CMS;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{

    public function index() 
    {   
        $events = Event::orderBy('timedate')
                            ->paginate(10);

        return view('CMS.events.index')
            ->with('events', $events);

    }

    public function create() 
    {
        $event = Event::create();
        
        return redirect()   
            ->route('cms.events.edit', $event)
            ->with('info', 'Event created');

    }

    public function edit(Event $event) 
    {
        return view('CMS.events.edit')
            ->with('event', $event );
    }

    public function tag(Event $event, Request $request) 
    {   
        $event->tag($request->tag);
        return back()->with('info', 'tag added');

    }

    public function untag(Event $event, Request $request) 
    {
        $event->untag($request->tag);
        return back()->with('warning','tag removed');
    }

    public function body(Event $event, Request $request) 
    {

        $data = $request->validate([
            'body' => 'string|required'
        ]);

        $event->body = $data['body'];
        $event->save();

        return back()->with('info','Body text updated');

    }

    public function heading(Event $event, Request $request) 
    {
        $data = $request->validate([
            'heading' => 'required'
        ]);

        $event->heading = $data['heading'];
        $event->save();

        return back()->with('info','Heading text updated');


    }

    public function addImage(Event $event, Request $request)
    {
        if($request->hasFile('image') && 
                $request->file('image')->isValid() )
        {
            $filename = $event->id . ".jpg";
            $request->file('image')->move(public_path("/img/events/"), $filename);
        }
    
        return back()
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0')
            ->with('info','Image uploaded, you may need to refresh page to view');
    
    }

    public function toggleLive(Event $event)    
    {
        if($event->live)
        { 
            $event->live = false;
            $msg = "Event is offline";
        } else {
            $event->live = true;
            $msg = "Event is active";
        }
        $event->save();

        return back()->with('info', $msg);
    }

    public function dateTime(Event $event, Request $request)
    {

        $event->timedate=$request->dateTime;
        $event->save();

        return back()->with('info', "Event date updated to $event->timedate");


    }

}
