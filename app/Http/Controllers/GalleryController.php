<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use View;
use DB;

class GalleryController extends Controller
{
    //set table name

   private $table = 'galleries';
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $galleries = DB::table($this->table)->get();
        //dd($galleries);
      return view('gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('gallery.create');
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
        $name = $request->input('name');
        $description = $request->input('description');
        $cover_image = $request->file('cover_image');
        $owner_id = 1;

        if($cover_image){
            $cover_image_filename = $cover_image->getClientOriginalName();
            //$destination = base_path() . '/public/uploads';
            $cover_image->move(public_path('images'), $cover_image_filename);
        }else{
            $cover_image_filename = 'noimage.jpg';
        }

        // insert gallery
        DB::table($this->table)->insert(
            [
                'name'        => $name,
                'description' => $description,
                'cover_image' => $cover_image_filename,
                'owner_id'    => $owner_id
            ]
        );
        return redirect()->route('gallery.index')
                 ->with('success' , 'Gallery created');
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
        //die('Gallery/show'.$id);
        $gallery = DB::table($this->table)->where('id', $id)->first();
        $photos = DB::table('photos')->where('gallery_id', $id)->get();
       // dd($photos);
      return view('gallery.show', compact('gallery', 'photos'));
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
