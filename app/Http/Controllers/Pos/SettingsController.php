<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\User;
use Auth;
use Image; 
use Illuminate\Support\Carbon;
class SettingsController extends Controller
{
    
     

        public function AccountAll(){
            $user = User::latest()->get();
            return view('backend.settings.user',compact('user'));
        } 


        public function AccountAdd(){
            return view('backend.settings.user_add');
        } // End Method 

    
        public function AccountStore(Request $request){

            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string','max:255', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'role' => ['required', 'string', 'max:255'],
                'position' => ['required', 'string', 'max:255'],
            ]);  

            User::insert([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'position' => $request->position,
            ]);
            $notification = array(
                'message' => 'Company Details Inserted Successfully', 
                'alert-type' => 'success'
            );
             return redirect()->route('setting.all')->with($notification); 
        }

        // --------------------------------------------- Setting 


        public function SettingAll(){
            $setting = Settings::latest()->get();
            return view('backend.settings.index',compact('setting'));
        } 

        public function SettingAdd(){
            return view('backend.settings.setting_add');
        }
  

        public function SettingStore(Request $request){

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // 343434.png
            Image::make($image)->resize(200,200)->save('upload/customer/'.$name_gen);
            $save_url = 'upload/customer/'.$name_gen;

            Settings::insert([
                'companyname' => $request->companyname,
                'address' => $request->address,
                'tin' => $request->tin,
                'vat' => $request->vat,
                'image' => $save_url,
                'owner' => $request->owner,
                'tel' => $request->tel,
                'email' => $request->email,
                'sss' => $request->sss,
                'pagibig' => $request->pagibig,
                'philhealth' => $request->philhealth,
                'created_by' => Auth::user()->id,
                'created_at' => Carbon::now(), 
            ]);

            $notification = array(
                'message' => 'Company Details Inserted Successfully', 
                'alert-type' => 'success'
            );
             return redirect()->route('setting.all')->with($notification); 

        }

        public function SettingEdit($id){
            $setting = Settings::all();
            $setting = Settings::findOrFail($id);

            return view('backend.settings.setting_edit',compact('setting'));
        }



    public function SettingUpdate(Request $request){

        $setting_id = $request->id;
        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // 343434.png
            Image::make($image)->resize(200,200)->save('upload/customer/'.$name_gen);
            $save_url = 'upload/customer/'.$name_gen;

            Settings::findOrFail($setting_id)->update([
                'companyname' => $request->companyname,
                'address' => $request->address,
                'tin' => $request->tin,
                'vat' => $request->vat,
                'image' => $save_url,
                'owner' => $request->owner,
                'tel' => $request->tel,
                'email' => $request->email,
                'sss' => $request->sss,
                'pagibig' => $request->pagibig,
                'philhealth' => $request->philhealth,
                'created_by' => Auth::user()->id,
                'created_at' => Carbon::now(), 
            ]);

         $notification = array(
            'message' => 'Settings Updated with Image Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('setting.all')->with($notification); 
             
        } else{

            Settings::findOrFail($setting_id)->update([
                'companyname' => $request->companyname,
                'address' => $request->address,
                'tin' => $request->tin,
                'vat' => $request->vat,
                'owner' => $request->owner,
                'tel' => $request->tel,
                'email' => $request->email,
                'sss' => $request->sss,
                'pagibig' => $request->pagibig,
                'philhealth' => $request->philhealth,
                'created_by' => Auth::user()->id,
                'created_at' => Carbon::now(), 

        ]);
         $notification = array(
            'message' => 'Setting Updated without Image Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('setting.all')->with($notification); 

        } // end else 

    } // End Method

    public function SettingDelete($id){

        $setting = Settings::findOrFail($id);
        $img = $setting->image;
        unlink($img);

        Settings::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Settings Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method

}
