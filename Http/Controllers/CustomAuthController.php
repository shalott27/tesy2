<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
//เพิ่ม model
use App\Models\User;
//เพิ่ม security password
use Hash;
//เพิ่ม session
use Session;

use Illuminate\Validation\Rules\Password;
class CustomAuthController extends Controller
{
    //login
    public function login(){
        return view('auth.login');
    }
    //register
    public function registration(){
        return view('auth.registration');
        //เปิดหน้า view    return view('auth.registration');
        //เรียกคำตัวนี้ออกมา return "Registration";
    }
    
//required registerUser
    public function registerUser(Request $request){
        $request->validate([
          //  'username' => 'required|max:12|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|unique:username',
               'username' => [
                'required',
                'max:12',             // max 12 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'unique:users'
                 ],
            'firstname'=>'required',
            'lastname'=>'required',
            'password' => [
                'required',
                'string',
                Password::min(6)
                    ->uncompromised(5)
            ],
           // 'password'=>'required|min:6',
        //image |file(ชนิดข้อมูล)|mimes:jpeg,png,jpg(นาสกุลไฟล์)
           // 'image_path' =>'required|file|image|mimes:jpeg,png,jpg|max:5000', 
                ],
             /*   ['username.required'=>"Plesae fill your Username",
                'username.max'=>"Username is max 12 characters in length",
                'username.unique'=>"Username is already!!",
                'username.regex'=>" Username must includes A-Z, a-z, 0-9"
                
                ]*/
    
    );
    /*$newImageName = time() . '-' . $request->name . '-'.
    $request->image->extention();
    //folder public->images
    $request->image->move(public_path('images'), $newImageName);*/
////////////////////////////////////////////////////////////
        $user = new User();
        $user->username = $request->username;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
       // $user->image_path = $request->image_path;
        //$user->password = $request->password; แบบเห็น password
        $user->password = Hash::make($request->password);
        $res =$user->save();
        //connect view->register @if(Seesion::has('success'))
        if ($res){
            return back()->with('success', 'You have registerd succesfully');
        }else{
            return back()->with('fail', 'something wrong!!');
        }
    } 
//required loginUser
    public function loginUser(Request $request){
        $request->validate([
            'username'=>'required|max:12',
            'password'=>'required|min:6',
        ]);
        //   modelname chaeckAt username = $request->username  
        $user = User::where('username', '=', $request->username)->first();
        //connect view->login @if(Seesion::has('success'))
        if ($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
            }else{
                return back()->with('fail', 'Password is not matches!!');
            }
        }else{
            return back()->with('fail', 'This username is not registered!!');
        }
    }
//loginUser
    public function dashboard(){
       $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        //                    use compact can pass any data into blade 
        return view('dashboard', compact('data'));
    }
//logout from session
    public function logout(){
        if(Session::has('loginId')){
            //pull is forget id /exiting session
            Session::pull('loginId');
            return redirect('login');
        }
    }

    public function edit($id)
    {
        $editPro = User::find($id);
       //           view            route   in function update
        return view('edit')->with('editPro',$editPro);
    }

    public function update(Request $request, $id)
    {
      $request->validate([
        //  'username' => 'required|max:12|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|unique:username',
             'username' => [
              'required',
              'max:12',             // max 12 characters in length
              'regex:/[a-z]/',      // must contain at least one lowercase letter
              'regex:/[A-Z]/',      // must contain at least one uppercase letter
              'regex:/[0-9]/',      // must contain at least one digit
              'unique:users'
               ],
          'firstname'=>'required',
          'lastname'=>'required',
          'password' => [
            'required',
            'string',
            Password::min(6)
                ->uncompromised(5)
        ],
         
      //image |file(ชนิดข้อมูล)|mimes:jpeg,png,jpg(นาสกุลไฟล์)
         // 'image_path' =>'required|file|image|mimes:jpeg,png,jpg|max:5000', 
              ],
           /*   ['username.required'=>"Plesae fill your Username",
              'username.max'=>"Username is max 12 characters in length",
              'username.unique'=>"Username is already!!",
              'username.regex'=>" Username must includes A-Z, a-z, 0-9"
              
              ]*/
  
  );
  
  
  $editPro = New User;
  $editPro->username = $request->username;
  $editPro->firstname = $request->firstname;
  $editPro->lastname = $request->lastname;
  $editPro->password = $request->password;
  $editPro->save();
  Session()->flash("success","บันทึกข้อมูลเรียบร้อยแล้ว !");                              //สร้าง สถานะ action ไว้สำหรับแจ้งเตือนข้อความ เช่น เพิ่มข้อมูล,แก้ไข,ลบ ...
                                                                                    //... ส่งการแจ้งเตือนไปยัง resources/view/layouts/master.blade.php

                                                                                    //- ref - https://laravel.com/docs/7.x/session#flash-data

    return redirect('/dashboard');
    }



  /*  
    public function update(Request $request)
    {
           $current_user = new User();
            
            $request->validate([
                'username' =>['required', 'string', 'max:12', 'unique:users,'. $current_user->id],
                    'firstname' => ['required', 'string', 'max:255'],
                    'lastname' => ['required', 'string', 'max:255']
                   // 'avatar' => ['mimes:jpeg, jpg, png, gif', 'max:2048'],
            ]);
            $current_user->username = $request->get('username');
            $current_user->firstname = $request->get('firstname');
            $current_user->lastname = $request->get('lastname');
            $current_user->password = $request->get('password');
     
     
        
            // Update user
            $current_user->update();
            if ($res){
                return redirect('dashboard')->with('success', 'User data updated successfully');
            }else{
                return back()->with('fail', 'something wrong!!');
            }  
        }
*/


}