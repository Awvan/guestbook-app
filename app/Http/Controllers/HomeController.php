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
        ->withCount('registrations')
            ->where('event_date', '>=', now())
            ->where('is_open', true)
            ->orderBy('event_date', 'asc')
            ->get();

        return view('welcome', compact('events'));
    }
}
