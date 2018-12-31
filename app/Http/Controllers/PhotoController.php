<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PhotoController extends Controller
{
    
    private $table = 'photos';
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($gallery_id)
    {
        //
        return view('photo.create', compact('gallery_id'));
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
        
        $gallery_id = $request->input('gallery_id');
        $title = $request->input('title');
        $description = $request->input('description');
        $location = $request->input('location');
        $image = $request->file('image');
        $owner_id = 1;

        if($image){
            $image_filename = $image->getClientOriginalName();
            //$destination = base_path() . '/public/uploads';
            $image->move(public_path('images'), $image_filename);
        }else{
            $image_filename = 'noimage.jpg';
        }

        // insert photo
        DB::table($this->table)->insert(
            [
                'title'        => $title,
                'gallery_id'   => $gallery_id,
                'description'  => $description,                
                'location'     => $location,
                'image'        => $image_filename,
                'owner_id'     => $owner_id
            ]
        );
        return redirect()->route('gallery.show', array('id' => $gallery_id))
                 ->with('success' , 'Photo uploaded');
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
        die('Gallery/show'.$id);
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
    public function details($id)
    {
        //
        $photo = DB::table($this->table)->where('id', $id)->first();
        // render template
       // dd($photo);
        return view('photo.details', compact('photo'));
    }
}
