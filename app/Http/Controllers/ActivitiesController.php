<?php
namespace App\Http\Controllers;

use App\Http\Requests\ActivityRequest;
use App\Models\Activities;
use App\Models\Criteria;
use App\Services\ActivityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivitiesController extends Controller
{
    protected $activityService;

    public function __construct(ActivityService $activityService)
    {
        $this->activityService = $activityService;
    }

    public function create()
    {
        $teacher = Auth::user()->teacher;
        if ($teacher) {
            $sectionsSubjects = $teacher->sections()->with('subjects')->get();
            return view('teacher.activities.create', compact('teacher', 'sectionsSubjects'));
        }

        return redirect()->route('login')->with('error', 'Access Denied.');
    }

    public function store(ActivityRequest $request)
    {
        $this->activityService->createActivity($request->validated());
        return redirect()->route('activities.index')->with('success', 'Activity and criteria created successfully.');
    }

    public function index()
    {
        $teacher = Auth::user()->teacher;
        if ($teacher) {
            $activities = Activities::where('teacher_id', $teacher->id)->get(['id', 'activity_name', 'activity_description', 'due_date', 'new_due_date', 'activity_percent']);
            return view('teacher.activities.index', compact('activities'));
        }

        return redirect()->route('login')->with('error', 'Access Denied.');
    }

    public function edit($id)
    {
        $new_due_date = Activities::where('id', $id)->value('new_due_date');
        return view('teacher.activities.edit', compact('new_due_date', 'id'));
    }

    public function update(ActivityRequest $request, $id)
    {
        $activity = Activities::findOrFail($id);
        $this->activityService->updateActivity($request->validated(), $activity);

        return redirect()->route('activities.index')->with('success', 'Actividad actualizada con éxito.');
    }

    public function show($id)
    {
        $activity = Activities::with('criteria')->findOrFail($id);
        return view('teacher.activities.show', compact('activity'));
    }
}
