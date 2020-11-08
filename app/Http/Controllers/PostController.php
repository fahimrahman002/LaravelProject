<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function writepost()
    {
        return view('template.writepost');
    }
    public function storepost(Request $request)
    {
        $validateData = $request->validate(
            [
                'title' => 'max:125',
                'image' => 'mimes:jpeg,jpg,png|max:1000'
            ]
        );
        $data = array();
        $data['title'] = $request->title;
        $data['category_id'] = $request->category_id;
        $data['details'] = $request->post;
        $image = $request->file('image');
        if ($image) {
            $dateTime = now();
            $originalname = $image->getClientOriginalName();
            $ext = strtolower($image->getClientOriginalExtension());
            $imageFullName = $originalname . $dateTime . '.' . $ext;
            $uploadPath = 'public/frontend/img/posts/';
            $imageUrl = $uploadPath . $imageFullName;
            $success = $image->move(public_path('frontend') . '/img/', $imageFullName);
            $data['image'] = $imageUrl;
            DB::table('posts')->insert($data);
            $notification = array('message' => 'Your blog has been posted successfully', 'alert-type' => 'success');
            return Redirect('/')->with($notification);
        } else {
            $data_insert = DB::table('posts')->insert($data);
            $notification = array('message' => 'Your blog has been posted successfully', 'alert-type' => 'success');
            return Redirect('/home')->with($notification);
        }
    }
}
