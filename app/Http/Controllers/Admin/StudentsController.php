<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Students::orderBy('id', 'desc')->paginate(5);

        return view('admin.students.index', [
            'students' => $students
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password'=>'required',
            'content'=>'required',
            'fathername'=>'required',
            'address'=>'required',
            'rollno'=>'required',
            'class' => 'required',
            'subject'=>'required',
            'classteacher'=>'required'
        ]);

        Students::create($request->post());

        return redirect()->route('students.index')->with('success', 'Students has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Students $student)
    {
        return view('admin.students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Students  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Students $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Students $student)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $student->fill($request->post())->save();

        return redirect()->route('students.index')->with('success', 'Students Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Students  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Students $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Students has been deleted successfully');
    }
} 
