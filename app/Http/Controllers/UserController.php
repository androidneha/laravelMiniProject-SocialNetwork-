<?php
namespace App\Http\Controllers;
use \Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function postSignUp(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email|unique:users',
            'first_name'=>'required|max:100',
            'password'=>'required|min:8',
        ]);
        $email=$request['email'];
        $first_name=$request['first_name'];
        $password= bcrypt($request['password']);
        
        $user = new User;
        $user->email=$email;
        $user->first_name=$first_name;
        $user->password=$password;
        
        $user->save();
        Auth::login($user);
        return redirect()->route('dashboard');
               
    }

    public function postSignIn(Request $request)
    {
         $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',
        ]);
       if( Auth::attempt(["email"=>$request['email'],"password"=>$request['password']]))
       {
           return redirect()->route('dashboard');
       }
       return redirect()->route('home')->with(['message'=>'Email Or Password is Wrong']);
    }
    
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
    public function getAccount()
    {
        return view('account',['user'=>Auth::user()]);
    }
    public function postAccountSave(Request $request)
    {
        $this->validate($request,
                [
                    'first_name'=>'required|max:120'
                ]);
        $user=Auth::user();
        $user->first_name=$request['first_name'];
        $user->update();
        $file=$request->file('image');
        $filename=$request['first_name'].'-'.$user->id.'.jpg';
        if($file)
        {
            \Illuminate\Support\Facades\Storage::disk('local')->put($filename, \Illuminate\Support\Facades\File::get($file));
        }
        return redirect()->route('account');
    }
    public function getUserImage($filename)
    {
        $file= \Illuminate\Support\Facades\Storage::disk('local')->get($filename);
        return new \Illuminate\Http\Response($file,200);
    }
}

