<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\AdminProfileRequest;
use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Admin;
use App\Models\DocumentResource;
use App\Models\Student;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.index');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function store(AdminLoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'account_status' => true,
        ];

        if (auth('web_admins')->attempt($credentials)) {
            session()->regenerateToken();

            return redirect()->intended(route('admin.dashboard'));
        } else {
            return redirect()->route('admin.index');
        }
    }

    public function profile()
    {

        return view('admin.profile')->with([
            'profile' => auth('web_admins')->user(),
        ]);
    }

    public function profileStore(AdminProfileRequest $request, Admin $admin)
    {
        if ($admin->saveProfile($request->validated())) {
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

    public function manageStudents(Student $studentUser)
    {
        return view('admin.students.index')->with([
            'students' => $studentUser->getAllStudents(),
        ]);
    }

    public function createStudent()
    {
        return view('admin.students.create');
    }

    public function editStudent(Student $student)
    {
        return view('admin.students.edit')->with([
            'student' => $student,
        ]);
    }

    public function storeStudent(CreateStudentRequest $request, Student $studentUser)
    {
        if ($studentUser->createStudent($request->validated())) {
            return redirect()->route('admin.manage-students')->with([
                'alert_type' => 'success',
                'alert_message' => 'Trainee added successfully.',
            ]);
        } else {
            return redirect()->route('admin.manage-students')->with([
                'alert_type' => 'danger',
                'alert_message' => 'An error occurred while adding the trainee.',
            ]);
        }
    }

    public function updateStudent(Student $student, UpdateStudentRequest $request)
    {
        if ($student->updateStudent($student, $request->validated())) {
            return redirect()->route('admin.manage-students')->with([
                'alert_type' => 'success',
                'alert_message' => 'Trainee edited successfully.',
            ]);
        } else {
            return redirect()->route('admin.manage-students')->with([
                'alert_type' => 'danger',
                'alert_message' => 'An error occurred while editing the trainee.',
            ]);
        }
    }

    public function destroyStudent(Student $student)
    {
        if ($student->delete()) {
            return back()->with([
                'alert_type' => 'success',
                'alert_message' => 'Trainee removed successfully.',
            ]);
        } else {
            return back()->with([
                'alert_type' => 'danger',
                'alert_message' => 'An error occurred while removing the trainee.',
            ]);
        }
    }

    public function logout()
    {
        auth('web_admins')->logout();

        session()->regenerateToken();

        return redirect()->route('admin.index');
    }
}
