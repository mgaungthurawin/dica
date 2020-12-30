<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Http\Requests\Backend\CategoryRequest;
Use Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(25);
        if(count($request->all()) > 0) {
            $data = $request->all();
            if(array_key_exists('name', $data)) {
                $categories = Category::where('title', 'like', '%' . $data['name'] . '%')->paginate(25);
            }
        }
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image_media')) {
            $media = saveSingleMedia($request, 'image');
            if (TRUE != $media['status']) {
                Alert::error('Error', 'product Not Found');
                return redirect(route('product.index'));
            }
            $data['media_id'] = $media['media_id'];
        }
        $category = Category::create($data);
        Alert::success('Success', 'Successfully Created category');
        return redirect(route('category.index'));
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
        $category = Category::find($id);
        if(empty($category)) {
            Alert::error('Error', 'Category Not Found');
            return redirect(route('category.index'));
        }
        return view('admin.category.edit', compact('category'));
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
        if ($request->hasFile('image_media')) {
            $media = saveSingleMedia($request, 'image');
            if (TRUE == $media['status']) {
                $data['media_id'] = $media['media_id'];
            }
        }
        Category::find($id)->update($data);
        Alert::success('Success', 'Successfully Updated category');
        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if(empty($category)) {
            Alert::error('Error', 'Category Not Found');
            return redirect(route('category.index'));
        }
        $category->delete();
        Alert::success('Success', 'Successfully deleted Category');
        return redirect(route('category.index'));
    }
}
