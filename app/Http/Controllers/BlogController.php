<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Helpers\CommanHelper;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Blog::where('is_deleted', 0)->latest()->paginate(5);

        return view('list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ];

        $validate = $this->validate($request->all(), $rules);
        if (!empty($validate)) {
            return redirect()->route('create')
                ->with('validation_error', $validate);
        }

        $slug = CommanHelper::slugify($request->title);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        Blog::create([
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'image_path' => $imageName,
            'published' => 1,
        ]);

        return redirect()->route('create')
            ->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $data = Blog::where('slug', $slug)->first();
        return view('blog', compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Blog::where('id', $id)->first();
        return view('edit', compact('data'));
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
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ];
        
        $validate = $this->validate($request->all(), $rules);
        if (!empty($validate)) {
            return redirect()->route('create')
                ->with('validation_error', $validate);
        }

        if (isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('images'), $imageName);
        } else {
            $imageName = $request->image_name;
        }

        Blog::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imageName,
            'published' => 1,
        ]);

        return redirect()->route('list')
            ->with('success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::where('id', $id)->update(['is_deleted' => 1]);
        return redirect()->route('list')
            ->with('success', 'Blog deleted successfully.');
    }
}
