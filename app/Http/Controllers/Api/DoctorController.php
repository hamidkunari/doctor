<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
use Image;
use DB;
class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $employee = Doctor::all();
        // return response()->json($employee);

         $employee = DB::table('doctors')
                   
                    ->join('suppliers','doctors.supplier_id','suppliers.id')
                    ->select('suppliers.sname','doctors.*')
                    ->orderBy('doctors.id','DESC')
                    ->get();
                    return response()->json($employee);
    
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
         $validated = $request->validate([
                'name' => 'required|unique:doctors|max:255',
                 'supplier_id' => 'required'
          
                
           
            ]);

         if($request->photo){
         $position  = strpos($request->photo, ';');
         $sup = substr($request->photo, 0, $position);
         $ext = explode('/', $sup)[1];

         $name  = time().".".$ext;
         $img = Image::make($request->photo)->resize(240,200);
         $upload_path = 'backend/doctor/';
         $image_url  = $upload_path.$name;
         $img->save($image_url);

         $employee  = new Doctor;
         $employee->name = $request->name;
         
         $employee->earned = $request->earned;
         $employee->status = $request->status;
         $employee->date = $request->date;
         $employee->address = $request->address;
         $employee->bio = $request->bio;
         $employee->description = $request->description;
         $employee->school = $request->school;
         $employee->sstartd = $request->sstartd;
         $employee->sendd = $request->sendd;
         $employee->university = $request->university;
         $employee->course = $request->course;
         $employee->startd = $request->startd;
         $employee->endd = $request->endd;
         $employee->cname = $request->cname;
         $employee->workd = $request->workd;
         $employee->workdd = $request->workdd;




          $employee->supplier_id = $request->supplier_id;

         $employee->photo = $image_url;
         $employee->save();
         }else{
            $employee  = new Doctor;
         $employee->name = $request->name;

         $employee->earned = $request->earned;
         $employee->status = $request->status;
         $employee->date = $request->date;
         $employee->address = $request->address;
         $employee->bio = $request->bio;
         $employee->description = $request->description;
         $employee->school = $request->school;
         $employee->sstartd = $request->sstartd;
         $employee->sendd = $request->sendd;
         $employee->university = $request->university;
         $employee->course = $request->course;
         $employee->startd = $request->startd;
         $employee->endd = $request->endd;
         $employee->cname = $request->cname;
         $employee->workd = $request->workd;
         $employee->workdd = $request->workdd;
       $employee->supplier_id = $request->supplier_id;
         
         $employee->save();
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
        $employee = DB::table('doctors')->where('id',$id)->first();
       return response()->json($employee);
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
        $data['name'] = $request->name;
   
        $data['earned'] = $request->earned;
        $data['status'] = $request->status;
        $data['date'] = $request->date;
        $data['address'] = $request->address;
        $data['bio'] = $request->bio;
        $data['description'] = $request->description;
        $data['school'] = $request->school;
        $data['sstartd'] = $request->sstartd;
        $data['sendd'] = $request->sendd;
        $data['university'] = $request->university;
        $data['course'] = $request->course;
        $data['startd'] = $request->startd;
        $data['cname'] = $request->cname;
        $data['workd'] = $request->workd;
        $data['workdd'] = $request->workdd;
        $data['supplier_id'] = $request->supplier_id;
        $image = $request->newphoto;

        if ($image) {
         $position = strpos($image, ';');
         $sub = substr($image, 0, $position);
         $ext = explode('/', $sub)[1];

         $name = time().".".$ext;
         $img = Image::make($image)->resize(240,200);
         $upload_path = 'backend/doctor/';
         $image_url = $upload_path.$name;
         $success = $img->save($image_url);
         
         if ($success) {
            $data['photo'] = $image_url;
            $img = DB::table('doctors')->where('id',$id)->first();
            $image_path = $img->photo;
            $done = unlink($image_path);
            $user  = DB::table('doctors')->where('id',$id)->update($data);
         }
          
        }else{
            $oldphoto = $request->photo;
            $data['photo'] = $oldphoto;
            $user = DB::table('doctors')->where('id',$id)->update($data);
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
        $employee = DB::table('doctors')->where('id',$id)->first();
       $photo = $employee->photo;
       if ($photo) {
         unlink($photo);
         DB::table('doctors')->where('id',$id)->delete();
       }else{
        DB::table('doctors')->where('id',$id)->delete();
       }
    }
}
