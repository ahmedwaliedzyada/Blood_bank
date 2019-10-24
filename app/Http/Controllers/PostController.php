<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Post;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $records = Post::paginate(20);
        return view('post.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Flash::Message('Success');
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'category_id' => 'required|numeric',
        ], [
            'title.required' => 'Title is Required',
            'content.required' => 'Content is Required',
            'image.required' => 'Image is Required',
            'category_id.required' => 'Category Id is Required'
        ]);
        $record = Post::create($request->all());
//        dd($request->hasFile('image'));
        if ($request->hasFile('image')) {
            $logo = $request->image;
            $logo_new_name = time() . $logo->getClientOriginalName();
            $logo->move('uploads/post', $logo_new_name);
            $record->image = 'uploads/post/' . $logo_new_name;
            $record->save();
        }
        flash()->success("Success");
        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
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
        $model = Post::findOrFail($id);
        return view('post.edit' , compact('model'));
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
        $records = Post::findOrFail($id);
        $records->update($request->all());
        if ( $request->hasFile('image')  ) {
            $logo = $request->image;
            $logo_new_name = time() . $logo->getClientOriginalName();
            $logo->move('uploads/post', $logo_new_name);
            $records->image = 'uploads/post/'.$logo_new_name;
            $records->save();
        }
        flash()->success('Edited');
        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Post::findOrFail($id);
        $record->delete();
        Flash::Message('Deleted');
        return back();
    }
}

