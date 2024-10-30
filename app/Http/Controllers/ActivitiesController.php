<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\Criteria;
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
        ]);

        // Crear criterios por actividad
        foreach ($request->criteria as $criterion) {
            Criteria::create([
                'activity_id' => $activity->id,
                'criterion_name' => $criterion['criterion_name'],
                'criterion_percent' => $criterion['criterion_percent'],
            ]);
        }

        return redirect()->route('teacher.students')->with('success', 'Activity and criteria created successfully.');
    }
}
