<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Patient;
use Image;
use DB;
class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $patient = DB::table('patients')
                   
                    ->join('doctors','patients.doctor_id','doctors.id')
                    ->select('doctors.name','patients.*')
                    ->orderBy('patients.id','DESC')
                    ->get();
                    return response()->json($patient);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
         'pname' => 'required|unique:patients|max:255',
         'phone' => 'required',
         'address' => 'required',
         'status' => 'required',
         'doctor_id'=>'required'
         ]);

        if ($request->photo) {
         $position = strpos($request->photo, ';');
         $sub = substr($request->photo, 0, $position);
         $ext = explode('/', $sub)[1];

         $name = time().".".$ext;
         $img = Image::make($request->photo)->resize(240,200);
         $upload_path = 'backend/patient/';
         $image_url = $upload_path.$name;
         $img->save($image_url);

         $patient = new Patient;
         $patient->pname = $request->pname;
         $patient->age = $request->age;
         $patient->address = $request->address;
         $patient->phone = $request->phone;
         $patient->visit = $request->visit;
         $patient->paid = $request->paid;
         $patient->status = $request->status;
         $patient->doctor_id = $request->doctor_id;
         $patient->photo = $image_url;
         $patient->save(); 
     }else{
         $patient = new Supplier;
        $patient->pname = $request->pname;
         $patient->age = $request->age;
         $patient->address = $request->address;
         $patient->phone = $request->phone;
         $patient->visit = $request->visit;
         $patient->status = $request->status;
         $patient->paid = $request->paid;
        
         $patient->save(); 

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
        $data = array();
        $data['status'] = $request->status;
        
       
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
            $img = DB::table('patients')->where('id',$id)->first();
            $image_path = $img->photo;
            $done = unlink($image_path);
            $user  = DB::table('patients')->where('id',$id)->update($data);
         }
          
        }else{
            $oldphoto = $request->photo;
            $data['photo'] = $oldphoto;
            $user = DB::table('patients')->where('id',$id)->update($data);
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
        //
    }
}
