<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Notification;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   public function addview()
   {
       if(Auth::id()){
           if(Auth::user()->usertype==1){
       return view('admin.add_doctor');
       }
       else{
           return redirect()->back();
       }
    }
    else{
        return redirect('login');
    }
   }

   public function upload(Request $request)
   {
       $doctor = new Doctor();
       $image = $request->file;
       $imagename = time().'.'.$image->getClientOriginalExtension();
       $request->file->move('doctorimage',$imagename);
       $doctor->image=$imagename;
       $doctor->name=$request->name;
       $doctor->phone=$request->number;
       $doctor->room=$request->room;
       $doctor->specaility=$request->specaility;
       $doctor->save();
       return redirect()->back()->with('message','Doctor added Successfully');

   }

   public function showappointment()
   {
       $data = Appointment::all();
     return view('admin.showappointment',compact('data'));
   }

   public function approved($id)
   {
      $data = Appointment::find($id);
      $data->status = 'Approved';
      $data->save();
      return redirect()->back();
   }


   public function canceled($id)
   {
       $data = Appointment::find($id);
       $data->status = 'Canceled';
       $data->save();
       return redirect()->back();
   }


   public function showdoctor()
   {
       $data = Doctor::all();
        return view('admin.showdoctor',compact('data'));
   }


   public function update($id)
   {
       $data = Doctor::find($id);
     return view('admin.update_doctor',compact('data'));
    }


   public function delete($id)
   {
       $data = Doctor::find($id);
       $data->delete();
       return redirect()->back();
   }

   public function edit(Request $request,$id)
   {
       $doctor = Doctor::find($id);
       $image=$request->file;
       if($image){
       $imagename = time().'.'.$image->getClientOriginalExtension();
       $request->file->move('doctorimage',$imagename);
       $doctor->image=$imagename;
       }
       $doctor->name=$request->name;
       $doctor->phone=$request->number;
       $doctor->room=$request->room;
       $doctor->specaility=$request->specaility;
       $doctor->save();
       return redirect()->back();
   }

   public function emailview($id)
   {
       $data = Appointment::find($id);
     return view('admin.email_view',compact('data'));
   }

   public function sendemail(Request $request,$id)
   {
       $data = Appointment::find($id);
       $details = [
           'greeting' => $request->greeting,
           'body' => $request->body,
           'actiontext' => $request->actiontext,
           'actionurl' => $request->actionurl,
           'endpart' => $request->endpart
       ];
       Notification::send($data,new SendEmailNotification($details));
       return redirect()->back()->with('message','Email Send Successfull');
   }
}
