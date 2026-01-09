<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil acara yang tanggalnya hari ini atau ke depan
        $events = Event::with('category')
            ->where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->get();

        return view('welcome', compact('events'));
    }
}
