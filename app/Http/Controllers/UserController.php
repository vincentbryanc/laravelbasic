<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(User::all())
            ->addColumn('actions', function($data) {
                $actions = '<button type="button" user_id="'.$data->id.'" class="btnedit btn btn-warning btn-sm" data-target="#modalUser" data-toggle="modal">Edit <i class="mdi mdi-pencil" aria-hidden="true"></i></button>';
                return $actions;
            })
            ->rawColumns(['action'])
            ->escapeColumns([])
            ->make(true);
        }
        return view('backend.users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $age = $request->age;
        $password = Hash::make('123456789');

        $rules = array(
            'name' =>'required|max:191',
            'email' =>'required|max:191|unique:users',
            'age' =>'required|max:11',
        );

        $error = Validator::make($request->all(), $rules);
        
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // preparing data to be saved on database
        $form_data = array(
            'name' => $name,
            'email' => $email,
            'age' => $age,
            'password' => $password,
        );

        User::create($form_data);
        return response()->json(['success' => 'Data added successfully.']);
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
        $data = User::where('id', $id)->firstOrFail();
        return response()->json(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $age = $request->age;

        $rules = array(
            'name' =>'required|max:191',
            'email' =>'required|max:191|unique:users,email,'.$id.'',
            'age' =>'required|max:11',
        );

        $error = Validator::make($request->all(), $rules);
        
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // preparing data to be saved on database
        $form_data = array(
            'name' => $name,
            'email' => $email,
            'age' => $age,
        );

        User::where('id', $id)->update($form_data);
        return response()->json(['success' => 'Data added successfully.']);
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
    }
}
