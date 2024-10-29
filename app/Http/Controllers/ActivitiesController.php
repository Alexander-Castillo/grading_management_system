<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Activities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ActivitiesController extends Controller
{
    //
    public function getActivities()
    {
        Log::info('getActivities method called');

        $activities = Activities::with('subject', 'period')->get();
        Log::info('Activities retrieved: ' . $activities->count());

        $message = "Este es un mensaje desde el controlador.";
        
        // Uncomment the next line to see the data in the browser
        // dd($activities, $message);

        return view('students.activities', compact('activities', 'message'));
    }
    }
