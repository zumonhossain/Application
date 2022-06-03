<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basic;
use Carbon\Carbon;
use Session;
use Image;
use PDF;

class BasicController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function basic(){
        $data=Basic::where('basic_status',1)->where('basic_id',1)->firstOrFail();
        return view('admin.general.basic',compact('data'));
    }

    public function update_basic(Request $request){
        $this->validate($request,[
            'title'=>'required',
        ],[
            'title.required'=>'Please enter title!',
        ]);

        $update=Basic::where('basic_id',1)->update([
            'basic_title'=>$request['title'],
            'basic_subtitle'=>$request['subtitle'],
            'basic_details'=>$request['details'],
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
            $image=$request->file('pic');
            $logo='logo_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(100,100)->save('uploads/basic/'.$logo);
  
            Basic::where('basic_id',1)->update([
                'basic_logo'=>$logo
            ]);
          }
  
          if($request->hasFile('favicon')){
            $image=$request->file('favicon');
            $favicon='favicon_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(100,100)->save('uploads/basic/'.$favicon);
  
            Basic::where('basic_id',1)->update([
                'basic_favicon'=>$favicon
            ]);
          }
  
          if($request->hasFile('flogo')){
            $image=$request->file('flogo');
            $flogo='flogo_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(100,100)->save('uploads/basic/'.$flogo);
  
            Basic::where('basic_id',1)->update([
                'basic_flogo'=>$flogo
            ]);
          }

        if($update){
            Session::flash('success');
            return redirect('admin/general/basic');
        }else{
            Session::flash('error');
            return redirect('admin/general/basic');
        }
    }
}
