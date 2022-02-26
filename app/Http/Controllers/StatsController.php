<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Message;
use Illuminate\Support\Facades\Response;

class StatsController extends Controller
{
    /**
     * Render stats page with Inertia.
     * 
     * @return \Inertia\Response
     */
    public function renderStats(Request $request, $user = null)
    {
        if (!$user) abort(404);
        return Inertia::render('Stats', [
            'statsData' => [
                'messagesCount' => count(Message::where('user_id', $user)->get()->toArray())
            ]
        ]);
    }
}
