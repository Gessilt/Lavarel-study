<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
    public function index() {
        $events = Event::all();
        return view('event',['events' => $events]);
    }
    public function new() {
        $name = "Matheus";
        $names = ["Júlio","Levi","Ronaldo","Battisti"];
        $age = 23;
        $numbers = [1,2,3,4,5];
        return view('new',['name'=>$name,'names'=>$names,'age'=>$age,'numbers'=>$numbers]);
    }
    public function static(){    
        return view('static');
    }

    public function queryParameter($id = null) {
        return view('queryParameters',['id' => $id]);
    }

    public function searchParameter() {

        $search = request('search');

        return view('queryParameterSearch',['search' => $search]);
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request) {
        $event = new Event;

        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->description = $request->description;
        $event->private = $request->private;
        $event->items = $request->items;
  
        //Image upload
        
        if($request->hasfile('image') && $request->file('image')->isValid()) {
            $requestImage  = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;
            $requestImage->move(public_path('img/events'), $imageName);

            $event->image = $imageName;

        }

        $event->save();


        return redirect('/event')->with('msg','Event created successfully');
    }

    public function show ($id) {
        
        $event = Event::findOrFail($id);

        return view('events.show',['event' => $event]);

    }
}
