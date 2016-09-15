<?php namespace App\Http\Controllers;

use App\user;
use Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Http\Requests\SettingsRequest;
use Hash;

class UserController extends Controller
{

 public function update(SettingsRequest $request)
{   $img_path = '/images';
    $id = Auth::user()->id;
    $user = User::findOrFail($id);
    $old_password = Request::input('old_password');
//if(Hash::check($old_password, Auth::user()->password)){
   // $user->name = Request::input('name');
if ( Request::input('action') === 'email' )
     $user->email = Request::input('email');
if ( Request::input('action') === 'password' )
     $user->password = Hash::make(Request::input('password'));
if ( Request::input('action') === 'phone' )
     $user->phone_number = Request::input('phone');
//}

if ( Request::input('action') === 'image' )
{
  if (Request::HasFile('imag'))
    {
        //  Before uploading a new image we will check if one already exists and delete it first.

        if ($user->imag != null)
        {
            $old_image = $user->imag;

            unlink(sprintf(public_path() . $img_path . '/%s', $old_image));
        }

        //  Next we will get the image to be uploaded, rename it so as to be unique, save and then alter as required.

        

        $file = Request::file('imag');
                    
        $image_name = time() . '-' . $file->getClientOriginalName();

        $file->move(public_path() . $img_path, $image_name);

      //  $image_alter = Image::make(sprintf(public_path() . $img_path . '%s', $image_name))->resize(75, 75)->save();

        $user->imag = $image_name; // Note we add the image path to the databse field before the save.

    }

    //Check for and store user image
}
    $user->save();

    return redirect('/nastroy');
}
    
}