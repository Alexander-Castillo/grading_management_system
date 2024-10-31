<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\Criteria;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivitiesController extends Controller
{
    //
    public function create()
    {
        $user = Auth::user();

        // Comprobar si el usuario es profesor y buscar sus secciones y materias.
        if ($user && $user->role === 'teacher') {
            $teacher = $user->teacher;

            // Obtener secciones y materias a las que está asignado el profesor
            $sectionsSubjects = $teacher->sections()->with('subjects')->get();

            return view('teacher.activities.create', compact('teacher', 'sectionsSubjects'));
        } else {
            return redirect()->route('login')->with('error', 'Access Denied.');
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'activity_name' => 'required|string|max:255',
            'activity_description' => 'nullable|string',
            'due_date' => 'required|date',
            'activity_percent' => 'required|integer|min:1|max:100',
            'criteria.*.criterion_name' => 'required|string',
            'criteria.*.criterion_percent' => 'required|integer|min:1|max:100',
        ]);

        // Calcular el porcentaje total para los criterios
        $totalCriterionPercent = array_sum(array_column($request->criteria, 'criterion_percent'));

        if ($totalCriterionPercent !== 100) {
            return back()->withErrors(['criteria' => 'The total of all criterion percentages must equal 100.']);
        }

        // Crear una actividad
        $activity = Activities::create([
            'subject_id' => $request->subject_id,
            'activity_name' => $request->activity_name,
            'activity_description' => $request->activity_description,
            'due_date' => $request->due_date,
            'new_due_date' => $request->new_due_date,
            'activity_percent' => $request->activity_percent,
            'total_grade' => 0, // Initially set to zero
            'teacher_id' => Auth::id(), // ID del docente autenticado
        ]);

        // Crear criterios por actividad
        foreach ($request->criteria as $criterion) {
            Criteria::create([
                'activity_id' => $activity->id,
                'criterion_name' => $criterion['criterion_name'],
                'criterion_percent' => $criterion['criterion_percent'],
            ]);
        }

        return redirect()->route('activities.index')->with('success', 'Activity and criteria created successfully.');
    }

    public function index()
    {
        $user = Auth::user();

        // Obtener las actividades del docente
        $activities = Activities::where('teacher_id', $user->id)->get();

        return view('teacher.activities.index', compact('activities'));
    }
    public function edit($id)
    {
        $new_due_date = Activities::where('id', $id)->value('new_due_date');
        return view('teacher.activities.edit', compact('new_due_date', 'id'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'new_due_date' => 'nullable|date',
        ]);

        $activity = Activities::findOrFail($id);

        // Solo actualiza el new_due_date
        $activity->update([
            'new_due_date' => $request->new_due_date,
        ]);

        return redirect()->route('activities.index')->with('success', 'Fecha de entrega actualizada con éxito.');
    }
    public function show($id) {
        $activity = Activities::with('criteria')->findOrFail($id);
    return view('teacher.activities.show', compact('activity'));
    }
    public function editActivity($id)
{
    $user = Auth::user();

        // Comprobar si el usuario es profesor y buscar sus secciones y materias.
        if ($user && $user->role === 'teacher') {
            $teacher = $user->teacher;

            // Obtener secciones y materias a las que está asignado el profesor
            $sectionsSubjects = $teacher->sections()->with('subjects')->get();
    $activity = Activities::with('criteria')->findOrFail($id);

    return view('teacher.activities.editActivity', compact('activity', 'sectionsSubjects'));
} else {
    return redirect()->route('login')->with('error', 'Access Denied.');
}
}

public function activityUpdate(Request $request, $id)
{
    $request->validate([
        'subject_id' => 'required|exists:subjects,id',
        'activity_name' => 'required|string|max:255',
        'activity_description' => 'nullable|string',
        'due_date' => 'required|date',
        'activity_percent' => 'required|integer|min:1|max:100',
        'criteria.*.criterion_name' => 'required|string',
        'criteria.*.criterion_percent' => 'required|integer|min:1|max:100',
    ]);

    $activity = Activities::findOrFail($id);
    
    // Actualiza los campos de la actividad
    $activity->update([
        'subject_id' => $request->subject_id,
        'activity_name' => $request->activity_name,
        'activity_description' => $request->activity_description,
        'due_date' => $request->due_date,
        'activity_percent' => $request->activity_percent,
    ]);

    // Actualiza los criterios
    foreach ($request->criteria as $criterionData) {
        $criterion = Criteria::findOrFail($criterionData['id']);
        $criterion->update([
            'criterion_name' => $criterionData['criterion_name'],
            'criterion_percent' => $criterionData['criterion_percent'],
        ]);
    }

    return redirect()->route('activities.index')->with('success', 'Actividad actualizada con éxito.');
}
}
