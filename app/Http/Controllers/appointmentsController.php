<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\appointment;
use App\Models\Task;

use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class appointmentsController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  */
    // public function index()
    // {
    //     //
    //     abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     $appointment = appointment::all();

    //     return view('tasks.index', compact('tasks'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     return view('tasks.create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(StoreTaskRequest $request)
    // {
    //     appointment::create($request->validated());

    //     return redirect()->route('tasks.index');
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(appointment $appointment)
    // {
    //     //
    //     abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     return view('tasks.show', compact('task'));
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(appointment $appointment)
    // {
    //     //
    //     abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     return view('tasks.edit', compact('task'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(UpdateTaskRequest $request, appointment $appointment)
    // {
    //     //
    //     $appointment->update($request->validated());

    //     return redirect()->route('tasks.index');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(appointment $appointment)
    // {
    //     //
    //     abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     $appointment->delete();

    //     return redirect()->route('tasks.index');
    // }
}
