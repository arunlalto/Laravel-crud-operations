<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emps = \App\Models\Emp::all();
        return view('emps.index', compact('emps'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('emps.create');
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
        'email' => 'required|email|unique:emps,email',
        'position' => 'required',
    ]);

    \App\Models\Emp::create($request->all());

    return redirect()->route('emps.index')->with('success', 'Employee created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emp = \App\Models\Emp::find($id);
        return view('emps.show', compact('emp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emp = \App\Models\Emp::find($id);
        return view('emps.edit', compact('emp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:emps,email,'.$id,
            'position' => 'required',
        ]);
    
        $emp = \App\Models\Emp::find($id);
        $emp->update($request->all());
    
        return redirect()->route('emps.index')->with('success', 'Employee updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp = \App\Models\Emp::find($id);
        $emp->delete();
    
        return redirect()->route('emps.index')->with('success', 'Employee deleted successfully.');
    }
}