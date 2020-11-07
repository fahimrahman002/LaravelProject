<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        return view('template.index');
    }
    public function about()
    {
        return view('template.about');
    }
    public function contact()
    {
        return view('template.contact');
    }
    public function samplepost()
    {
        return view('template.samplepost');
    }

    public function contact_us(Request $request)
    {
        $validatedData = $request->validate(['name' => 'required|max:20', 'phone' => 'required|min:11']);
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['message'] = $request->message;
        // return response()->json($data);
        // echo "<pre>";
        // print_r($data);
        $contact_form_fillup = DB::table('contacts')->insert($data);
        if ($contact_form_fillup) {
            $notification = array(
                'message' => 'Contact form has been submitted Successfully',
                'alert-type' => 'success'
            );
            return Redirect('/')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
