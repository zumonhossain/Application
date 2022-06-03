<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\IncomeCategoryExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use App\Models\IncomeCategory;
use Carbon\Carbon;
use Session;
use PDF;

class IncomeCategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=IncomeCategory::where('incate_status',1)->orderBy('incate_id','DESC')->get();
        return view('admin.income-category.all',compact('all'));
    }

    public function add(){
        return view('admin.income-category.add');
    }

    public function edit($slug){
        $data=IncomeCategory::where('incate_status',1)->where('incate_slug',$slug)->firstOrFail();
        return view('admin.income-category.edit',compact('data'));
    }

    public function view($slug){
        $data=IncomeCategory::where('incate_status',1)->where('incate_slug',$slug)->firstOrFail();
        return view('admin.income-category.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:255',
          ],[
            'name.required'=>'Please enter name!',
        ]);

        $slugName = Str::slug($request['name'], '-');
        $slug=time().'-'.$slugName;

        $insert=IncomeCategory::insertGetId([
          'incate_name'=>$request['name'],
          'incate_remarks'=>$request['remarks'],
          'incate_slug'=>$slug,
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
            Session::flash('success','value');
            return redirect('admin/income/category/add');
        }else{
            Session::flash('error','value');
            return redirect('admin/income/category/add');
        }
    }

    public function update(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:255',
          ],[
            'name.required'=>'Please enter name!',
        ]);

        $id=$request['id'];
        $slugName = Str::slug($request['name'], '-');
        $slug=time().'-'.$slugName;
        

        $update=IncomeCategory::where('incate_status',1)->where('incate_id',$id)->update([
          'incate_name'=>$request['name'],
          'incate_remarks'=>$request['remarks'],
          'incate_slug'=>$slug,
          'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($update){
            Session::flash('success','value');
            return redirect('admin/income/category/view/'.$slug);
        }else{
            Session::flash('error','value');
            return redirect('admin/income/category/edit/'.$slug);
        }
    }

    public function softdelete(Request $request) {
        $id=$request['modal_id'];
        $soft = IncomeCategory::where('incate_id',$id)->update([
                'incate_status' => 0
        ]);

        if($soft){
            Session::flash('success','value');
            return redirect('/admin/income/category');
        }else{
            Session::flash('error','value');
            return redirect('/admin/income/category');
        }
    }

    public function restore(Request $request){
        $id=$request['modal_id'];
        $restore = IncomeCategory::where('incate_status',0)->where('incate_id',$id)->update([
            'incate_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($restore){
            Session::flash('restore_success','value');
            return redirect('admin/recycle/income/category');
          }else{
            Session::flash('restore_error','value');
            return redirect('admin/recycle/income/category');
          }
    }

    public function delete(Request $request) {
        $id=$request['modal_id'];
        $delete = IncomeCategory::where('incate_id',$id)->delete(
            [
                'incate_status' => 0
            ]
        );
        if($delete){
            Session::flash('delete_success','value');
            return redirect('admin/recycle/income/category');
        }else{
            Session::flash('delete_error','value');
            return redirect('admin/recycle/income/category');
        }
    }

    public function pdf(){
        $all=IncomeCategory::where('incate_status',1)->orderBy('incate_id','DESC')->get();
        $pdf = PDF::loadView('admin.income-category.pdf', compact('all'));
        return $pdf->download('incomeCategory.pdf');
    }

    public function excel(){
        return Excel::download(new IncomeCategoryExport, 'IncomeCategory.xlsx');
    }








}
