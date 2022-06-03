<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use Carbon\Carbon;
use Session;
use Image;
use PDF;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=User::where('status',1)->orderBy('id','DESC')->get();
        return view('admin.user.all',compact('all'));
    }

    public function add(){
        return view('admin.user.add');
    }

    public function edit($id){
        $data=User::where('status',1)->where('id',$id)->firstOrFail();
        return view('admin.user.edit',compact('data'));
    }

    public function view($id){
        $data=User::where('id',$id)->firstOrFail();
        return view('admin.user.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
          ],[
            'name.required'=>'Please enter name!',
            'email.required'=>'Please email email!',
            'password.required'=>'Please enter password!',
        ]);

        $insert=User::insertGetId([
          'name'=>$request['name'],
          'email'=>$request['email'],
          'phone'=>$request['phone'],
          'password'=>Hash::make($request['password']),
          'pic'=>$request['pic'],
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName='User_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(200,200)->save('uploads/user/'.$imageName);
          User::where('id',$insert)->update([
              'pic'=>$imageName
          ]);
        }

        if($insert){
            Session::flash('success','value');
            return redirect('admin/user/add');
        }else{
            Session::flash('error','value');
            return redirect('admin/user/add');
        }
    }

    public function update(Request $request){
        $id=$request['id'];
        $update=User::where('status',1)->where('id',$id)->update([
              'name'=>$request['name'],
              'email'=>$request['email'],
              'phone'=>$request['phone'],
              'password'=>Hash::make($request['password']),
              'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
            $image=$request->file('pic');
            $imageName='User_'.$id.'_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,200)->save('uploads/user/'.$imageName);

            User::where('id',$id)->update([
                'pic'=>$imageName,
            ]);
        }

        if($update){
          Session::flash('success','value');
          return redirect('admin/user/view/'.$id);
        }else{
          Session::flash('error','value');
          return redirect('admin/user/edit/'.$id);
        }
    }

    public function softdelete() {
        $id=$_POST['modal_id'];
        $softDel = User::where('id',$id)->update(
            [
                'status' => 0
            ]
        );
        if($softDel){
            Session::flash('success','value');
            return redirect('admin/user');
        }else{
            Session::flash('error','value');
            return redirect('admin/user');
        }
    }

    public function restore(Request $request){
        $id=$request['modal_id'];
        $restore = User::where('status',0)->where('id',$id)->update([
            'status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($restore){
            Session::flash('restore_success','value');
            return redirect('admin/recycle/user');
          }else{
            Session::flash('restore_error','value');
            return redirect('admin/recycle/user');
        }
    }

    public function delete(Request $request) {
        $id=$request['modal_id'];
        $softDel = User::where('id',$id)->delete(
            [
                'status' => 0
            ]
        );
        if($softDel){
            Session::flash('delete_success','value');
            return redirect('admin/recycle/user');
        }else{
            Session::flash('delete_success','value');
            return redirect('admin/recycle/user');
        }
    }

    public function pdf(){
        $all=User::where('status',1)->orderBy('id','DESC')->get();
        $pdf = PDF::loadView('admin.user.pdf', compact('all'));
        return $pdf->download('user.pdf');
    }

    public function excel(){
        return Excel::download(new UserExport, 'user.xlsx');
    }








}
