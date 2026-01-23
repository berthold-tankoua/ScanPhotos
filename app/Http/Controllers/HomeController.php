<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\PhotoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('frontend.welcome');
    }
    public function takePicture()
    {
        return view('frontend.camera');
    }
    public function viewEvent($code)
    {
        $event = Event::where('code', $code)->firstOrFail();
        if ($event->status !== 'active') {
            return view('frontend.event.view', compact('event'));
        } else {
            return view('frontend.event.view', compact('event'));
        }
    }
    public function viewEventImages($code)
    {
        $event = Event::where('code', $code)->firstOrFail();
        $images = PhotoList::where('event_id', $event->id)->get();
        if ($event->status !== 'active') {
            return view('frontend.event.images', compact('event', 'images'));
        } else {
            return view('frontend.event.images', compact('event', 'images'));
        }
    }
    public function viewResults()
    {
        if (Session::has('photoIds')) {
            $photoIds = Session::get('photoIds');
        }
        $photos = PhotoList::whereIn('id', $photoIds)->get();
        return view('frontend.results.image', compact('photos'));
    }
}
