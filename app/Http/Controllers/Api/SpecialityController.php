<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Speciality;
use Image;
use DB;
class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $supplier = Speciality::all();
        return response()->json($supplier);
    }

     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
         'specialityname' => 'required|unique:specialities|max:255',
         

        ]);

        if ($request->photo) {
         $position = strpos($request->photo, ';');
         $sub = substr($request->photo, 0, $position);
         $ext = explode('/', $sub)[1];

         $name = time().".".$ext;
         $img = Image::make($request->photo)->resize(240,200);
         $upload_path = 'backend/speciality/';
         $image_url = $upload_path.$name;
         $img->save($image_url);

         $supplier = new Speciality;
         $supplier->specialityname = $request->specialityname;
         
         $supplier->photo = $image_url;
         $supplier->save(); 
     }else{
         $supplier = new Speciality;
         $supplier->specialityname = $request->specialityname;
       
        
         $supplier->save(); 

     } 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $supplier = DB::table('specialities')->where('id',$id)->first();
       return response()->json($supplier);
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
        $data = array();
        $data['specialityname'] = $request->specialityname;
        
       
        $image = $request->newphoto;

        if ($image) {
         $position = strpos($image, ';');
         $sub = substr($image, 0, $position);
         $ext = explode('/', $sub)[1];

         $name = time().".".$ext;
         $img = Image::make($image)->resize(240,200);
         $upload_path = 'backend/supplier/';
         $image_url = $upload_path.$name;
         $success = $img->save($image_url);
         
         if ($success) {
            $data['photo'] = $image_url;
            $img = DB::table('specialities')->where('id',$id)->first();
            $image_path = $img->photo;
            $done = unlink($image_path);
            $user  = DB::table('specialities')->where('id',$id)->update($data);
         }
          
        }else{
            $oldphoto = $request->photo;
            $data['photo'] = $oldphoto;
            $user = DB::table('specialities')->where('id',$id)->update($data);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $supplier = DB::table('specialities')->where('id',$id)->first();
       $photo = $supplier->photo;
       if ($photo) {
         unlink($photo);
         DB::table('specialities')->where('id',$id)->delete();
       }else{
        DB::table('specialities')->where('id',$id)->delete();
       }
    }
}
