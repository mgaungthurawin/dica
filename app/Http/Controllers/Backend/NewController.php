<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\News;
use App\Http\Requests\Backend\NewRequest;
Use Alert;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $news = News::orderBy('id', 'DESC')->paginate(25);
        if(count($request->all()) > 0) {
            $data = $request->all();
            if(array_key_exists('name', $data)) {
                $news = News::where('title', 'like', '%' . $data['name'] . '%')
                            ->orWhere('content', 'like', '%' . $data['name'] . '%')->paginate(25);
            }
        }
        return view('admin.new.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$categories = Category::all();
        return view('admin.new.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewRequest $request)
    {
        $data = $request->all();
        $data['title'] = $data['title'] ."|&|" . $data['mm_title'];
        $data['content'] = $data['content'] ."|&|" . $data['mm_content'];
        News::create($data);
        Alert::success('Success', 'Successfully Created News');
        return redirect(route('new.index'));
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
        $new = News::find($id);
        $categories = Category::all();
        if(empty($new)) {
            Alert::error('Error', 'News Not Found');
            return redirect(route('new.index'));
        }
        return view('admin.new.edit', compact('new','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewRequest $request, $id)
    {
        $new = News::find($id);
        if(empty($new)) {
            Alert::error('Error', 'News Not Found');
            return redirect(route('new.index'));
        }
        $data = $request->all();
        $data['title'] = $data['title'] ."|&|" . $data['mm_title'];
        $data['content'] = $data['content'] ."|&|" . $data['mm_content'];
        $new->update($data);
        Alert::success('Success', 'Successfully Updated News');
        return redirect(route('new.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = News::find($id);
        if(empty($new)) {
            Alert::error('Error', 'News Not Found');
            return redirect(route('new.index'));
        }
        $new->delete();
        Alert::success('Success', 'Successfully deleted News');
        return redirect(route('new.index'));
    }
}
