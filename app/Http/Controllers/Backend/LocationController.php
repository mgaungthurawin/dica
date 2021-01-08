<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Location;
use App\Http\Requests\Backend\LocationRequest;
Use Alert;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $locations = Location::orderBy('id', 'DESC')->paginate(25);
        if(count($request->all()) > 0) {
            $data = $request->all();
            if(array_key_exists('name', $data)) {
                $locations = Location::where('name', 'like', '%' . $data['name'] . '%')->paginate(25);
            }
        }
        return view('admin.location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationRequest $request)
    {
        Location::create($request->all());
        Alert::success('Success', 'Successfully Created Location');
        return redirect(route('location.index'));
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
        $location = Location::find($id);
        if(empty($location)) {
            Alert::error('Error', 'Location Not Found');
            return redirect(route('location.index'));
        }
        return view('admin.location.edit', compact('location'));
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
        $location = Location::find($id);
        if(empty($location)) {
            Alert::error('Error', 'Location Not Found');
            return redirect(route('location.index'));
        }
        $location->update($request->all());
        Alert::success('Success', 'Successfully Updated Location');
        return redirect(route('location.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::find($id);
        if(empty($location)) {
            Alert::error('Error', 'Location Not Found');
            return redirect(route('location.index'));
        }
        $location->delete();
        Alert::success('Success', 'Successfully deleted Location');
        return redirect(route('location.index'));
    }
}
