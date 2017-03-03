<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Employees extends Controller
{
    /**
     * Get all records in database.
     *
     * @return Response
     */
    public function get(Request $request) {
        $employees = Employee::all();
        // \Log::debug($employees);
        return response()->json($employees);
    }
/**
 * Read a record.
 *
 * @return Response
 */
public function read($id = null) {
    if ($id == null) {
        return response()->json(['message' => 'Id is invalid!'], 400);
    } else {
        $employee = $this->show($id);
        if ($employee == null) {
            return response()->json(['message' => 'Not found!'], 404);
        }
        return response()->json($employee);
    }
}

/**
 * Create a newly record in database.
 *
 * @param  Request  $request
 * @return Response
 */
public function create(Request $request) {
    $employee = new Employee;

    $employee->name = $request->input('name');
    $employee->email = $request->input('email');
    $employee->contact_number = $request->input('contact_number');
    $employee->position = $request->input('position');
    $employee->save();

    $this->get($request);
}

/**
 * Find a record.
 *
 * @param  int  $id
 * @return Response
 */
public function show($id) {
    return Employee::find($id);
}

/**
 * Update a record.
 *
 * @param  Request  $request
 * @param  int  $id
 * @return Response
 */
public function update(Request $request, $id) {
    $employee = Employee::find($id);
    if ($employee == null) {
        return response()->json(['message' => 'Not found!'], 404);
    }

    $employee->name = $request->input('name');
    $employee->email = $request->input('email');
    $employee->contact_number = $request->input('contact_number');
    $employee->position = $request->input('position');
    $employee->save();

    $this->get($request);
}

/**
 * Delete a record
 *
 * @param  int  $id
 * @return Response
 */
public function delete(Request $request, $id) {
    $employee = Employee::find($id);
    if ($employee == null) {
        return response()->json(['message' => 'Not found!'], 404);
    }

    Employee::destroy($id);

    $this->get($request);
}
}
