<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Alert;
use Hash;
use App\Http\Requests\Backend\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('user_type', 'ADMIN')->orderBy('id', 'DESC')->paginate(25);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['user_type'] = 'ADMIN';
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        Alert::success('Success', 'Successfully Created User');
        return redirect(route('user.index'));
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
        $user = User::find($id);
        if (empty($user)) {
            Alert::error('Error', 'User Not Found');
            return redirect(route('user.index'));
        }
        return view('admin.user.edit',compact('user'));
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
        $data = $request->all();
        $user = User::find($id);
        if(empty($user)) {
            Alert::error('Error', 'User Not Found');
            return redirect(route('user.index'));
        }
        User::find($id)->update($data);
        Alert::success('Success', 'Successfully Updated User');
        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (empty($user)) {
            Alert::error('Error', 'user Not Found');
            return redirect(route('user.index'));
        }
        $user->delete();
        Alert::success('Success', 'Successfully deleted user');
        return redirect(route('user.index'));
    }
}
