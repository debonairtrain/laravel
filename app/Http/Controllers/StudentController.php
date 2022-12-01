<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentLoginRequest;
use App\Http\Requests\StudentProfileRequest;
use App\Models\Assessment;
use App\Models\AssessmentRequirement;
use App\Models\DocumentResource;
use App\Models\Resource;
use App\Models\ResourceRequirement;
use App\Models\Student;
use App\Models\VideoResource;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class StudentController extends Controller
{
    public function index()
    {
        return view('students.index');
    }

    public function dashboard(VideoResource $videoResource)
    {
        return view('students.dashboard')->with([
            'video' => $videoResource->getLatestVideo(),
        ]);
    }

    public function store(StudentLoginRequest $request)
    {
        $credentials = [
            'student_number' => $request->student_number,
            'password' => $request->password,
        ];

        if (auth()->attempt($credentials)) {
            session()->regenerateToken();

            return redirect()->intended(route('student.dashboard'));
        } else {
            return redirect()->route('student.index');
        }
    }

    public function profile()
    {

        return view('students.profile')->with([
           'profile' => auth()->user(),
        ]);
    }

    public function resources(DocumentResource $documentResource, VideoResource $videoResource)
    {
        return view('students.resources')->with([
                'documentResources' => $documentResource->getAllDocuments(),
                'videoResources' => $videoResource->getAllVideos(),
            ]);
    }

    public function showDocument(DocumentResource $document)
    {
        return view('students.documents.show')->with([
            'document' => $document->load(['documentType', 'documentStatus', 'media']),
        ]);
    }

    public function profileStore(StudentProfileRequest $request, Student $student)
    {
        if ($student->saveProfile($request->validated())) {
            return back()->with([
                'alert_type' => 'success',
                'alert_message' => 'Profile saved successfully.',
            ]);
        } else {
            return back()->with([
                'alert_type' => 'danger',
                'alert_message' => 'An error occurred while saving the profile.',
            ]);
        }
    }

    public function destroyAssessment(Assessment $assessment)
    {
        if ($assessment->delete()) {
            return back()->with([
                'alert_type' => 'success',
                'alert_message' => 'Assessment removed successfully.',
            ]);
        } else {
            return back()->with([
                'alert_type' => 'danger',
                'alert_message' => 'An error occurred while removing the assessment.',
            ]);
        }
    }

    public function downloadMedia(Media $media)
    {
        return $media;
    }

    public function logout()
    {
        auth()->logout();

        session()->regenerateToken();

        return redirect()->route('student.index');
    }
}
