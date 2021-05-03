<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_data = Post::all();
        $posts= Post::all();
        return view('admin.post.index',compact('all_data','posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $cat = Category::all();
        $tag = Tag::all();
        return view('admin.post.create',[
            'all_cat' => $cat,
            'all_tag' => $tag
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'title' =>'required|unique:posts',
            'content' =>'required',

        ]);

        Post::create([
            'title'  =>$request->title,
            'slug'  =>Str::slug($request->title),
//            'user_id'  =>Auth::user()->id,
            'content'  => $request->content,
        ]);

        return redirect()->route('post.index')->with('success','Post added successfully');
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
        $data = Post::find($id);

        return [
            'title' => $data-> title,
            'id' => $data-> id,
        ];
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
        $id = $request->id;
        $data = Post::find($id);
//        $data ->user_id = $request->id;
        $data ->title = $request->title;
        $data ->slug = Str::slug($request->title);
        $data->update();
        return redirect()->route('post.index')->with('success','Post Updated successfull');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Post::find($id);
        $data ->delete();
        return redirect()->route('post.index')->with('success','Post Deleted successfull');
    }

    public function unpublishedPost(Request $request)
    {
        $data = Post::find($request->id)->update(['status' => 0]);
        return redirect()->route('post.index')->with('success','Post Unpublished successfull');
    }
    public function publishedPost(Request $request)
    {
        $data = Post::find($request->id)->update(['status' => 1]);
        return redirect()->route('post.index')->with('success','Post Published successfull');
    }








}
