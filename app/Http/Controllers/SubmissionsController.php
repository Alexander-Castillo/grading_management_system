<?php

namespace App\Http\Controllers;

use App\Models\Submissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class SubmissionsController extends Controller
{
    //
    public function create(Request $request, Submissions $Submision)
{
    // Get the logged-in student
    $student = Auth::user()->student;

    // Validate the request dat
    if($request->hasFile('file')){
        Cloudinary::destroy($Submission->image_public_id);
        $cloudinaryImage = $request->file('file')->storeOnCloudinary('submissions');
        $url = $cloudinaryImage->getPublicId();
    }
    $request->validate([
        'activity_id' => 'required|exists:activities,id',
        'file' => 'required|file|mimes:pdf,docx,xlsx,zip',
    ]);

    // Save the uploaded file
    $file = $request->file('file');
    $filename = time() . '-' . $file->getClientOriginalName();
    $file->storeAs('submissions', $filename);

    // Create the submission
    Submission::create([
        'student_id' => $student->id,
        'activity_id' => $request->activity_id,
        'file' => $filename,
    ]);

    // Redirect to a success page or display a success message
    return redirect()->route('student.dashboard')->with('success', 'Submission created successfully');
}
}
