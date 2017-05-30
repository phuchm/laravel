<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
    }

    $employee = $this->show($id);
    if ($employee == null) {
        return response()->json(['message' => 'Not found!'], 404);
    }

    return response()->json($employee);
}

/**
 * Create a newly record in database.
 *
 * @param  Request  $request
 * @return Response
 */
public function create(Request $request) {
    // Get the validation rules that apply to the request.
    $validator = Validator::make(
        array(
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contact_number' => $request->input('contact_number'),
            'position' => $request->input('position')
        ),
        array(
            'name' => 'required|min:2|max:30|unique:employees',
            'email' => 'required|email|unique:employees',
            'contact_number'=>'required|numeric',
            'position'=>'required|alpha'
        )
    );
    if ($validator->fails()) {
        $messages = $validator->messages();
        return response()->json(['message' => $messages], 400);
    } else {
        $employee = new Employee;
        
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->contact_number = $request->input('contact_number');
        $employee->position = $request->input('position');
        $employee->save();
        
        $this->get($request);
    }
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
    if ($id == null) {
        return response()->json(['message' => 'Id is invalid!'], 404);
    }

    // Get the validation rules that apply to the request.
    $validator = Validator::make(
        array(
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contact_number' => $request->input('contact_number'),
            'position' => $request->input('position')
        ),
        array(
            'name' => 'required|min:2|max:30',
            'email' => 'required|email|unique:employees',
            'contact_number'=>'required|numeric',
            'position'=>'required|alpha'
        )
    );
    if ($validator->fails()) {
        $messages = $validator->messages();
        return response()->json(['message' => $messages], 400);
    } else {
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
}

/**
 * Delete a record
 *
 * @param  int  $id
 * @return Response
 */
public function delete(Request $request, $id) {
    if ($id == null) {
        return response()->json(['message' => 'Id is invalid!'], 404);
    }

    $employee = Employee::find($id);
    if ($employee == null) {
        return response()->json(['message' => 'Not found!'], 404);
    }

    $employee->delete();

    $this->get($request);
}
}
