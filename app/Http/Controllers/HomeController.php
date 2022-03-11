<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class HomeController extends Controller
{
  public function redirect()
  {
      if (Auth::id()) {
        if (Auth::user()->usertype == '0') {
            $doctor = Doctor::all();
            return view('users.home',compact('doctor'));
        }
        else{
            return view('admin.home');
        }
      }
     else{
            return redirect()->back();
        }

  }

  public function index()
  {
      if(Auth::id())
      {
          return redirect('home');
      }
      else
      {
      $doctor = Doctor::all();
      return view('users.home',compact('doctor'));
      }
    }

    public function appointment(Request $request)
    {
        $data = new Appointment();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->date = $request->date;
        $data->doctor = $request->doctor;
        $data->phone = $request->number;
        $data->message = $request->message;
        $data->status = 'In progress';
        if(Auth::id())
        {
        $data->user_id = Auth::user()->id;
        }
        $data->save();
        return redirect()->back()->with('message','Appointment Request Successfully');

    }

    public function myappointment()
    {
        if(Auth::id())
        {
            $userid = Auth::user()->id;
            $appoints = Appointment::where('user_id',$userid)->get();
            return view('users.my_appointment',compact('appoints'));
        }
        else
        {
            return redirect()->back();
        }

    }

    public function cancel_appoint($id)
    {
       $data = Appointment::find($id);
       $data->delete();
       return redirect()->back();
    }
}
