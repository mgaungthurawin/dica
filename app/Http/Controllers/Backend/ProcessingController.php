<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ProductLocation;
use App\Model\Processing;
use App\Http\Requests\Backend\ProcessingRequest;
Use Alert;

class ProcessingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $processings = Processing::orderBy('id', 'DESC')->paginate(25);
        if(count($request->all()) > 0) {
            $data = $request->all();
            if(array_key_exists('name', $data)) {
                $processings = Processing::where('main_process', 'like', '%' . $data['name'] . '%')->paginate(25);
            }
        }
        return view('admin.processing.index', compact('processings'));
    }

    /**
     * Show the form for creating a processing resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('admin.processing.create');
    }

    /**
     * Store a processingly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProcessingRequest $request)
    {
    	$data = $request->all();
        Processing::create($data);
        Alert::success('Success', 'Successfully Created main processings');
        return redirect(url('admin/processing'));
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
        $processing = Processing::find($id);
        if(empty($processing)) {
            Alert::error('Error', 'main processings Not Found');
            return redirect(route('processing.index'));
        }
        return view('admin.processing.edit', compact('processing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProcessingRequest $request, $id)
    {
    	$processing = Processing::find($id);
        if(empty($processing)) {
            Alert::error('Error', 'main processings Not Found');
            return redirect(route('processing.index'));
        }
    	$data = $request->all();
        $data['location_id'] = json_encode($request['location_id']);
        $processing->update($data);
        Alert::success('Success', 'Successfully Updated main processings');
        return redirect(url('admin/processing'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $processing = Processing::find($id);
        // if(empty($processing)) {
        //     Alert::error('Error', 'main processings Not Found');
        //     return redirect(route('processing.index'));
        // }
        // $processing->delete();
        // Alert::success('Success', 'Successfully deleted main processings');
        // return redirect(route('processing.index'));
    }
}
