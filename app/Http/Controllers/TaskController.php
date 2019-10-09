<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tasks=Tasks::all();
        return view('indextasks',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $contacts=DB::table('contacts')->pluck('u_name','id');
        return view('createtasks',compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'user_id'=>'required'
        ]);
        $tasks = new Tasks([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'user_id' => $request->get('user_id')
            
        ]);
        $tasks->save();
            // Tasks::create($request->all());

        return redirect('/tasks')->with('success', 'Tasks saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tasks = Tasks::find($id);
        $contacts=DB::table('contacts')->pluck('u_name','id');
        return view('edittasks', compact('tasks','contacts')); 
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
        //
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            //'user_id'=>'required'
        ]);
        //$tasks = Tasks::where('name','=',$id);
        $tasks = Tasks::find($id);
        $tasks->name =  $request->get('name');
        $tasks->description = $request->get('description');
        $tasks->user_id = $request->get('user_id');
        $tasks->save();
        return redirect('tasks')->with('success', 'Task updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $contact = Contact::find($id);
        $contact->delete();
return redirect('tasks')->with('success', 'Task deleted!');
    }
}
