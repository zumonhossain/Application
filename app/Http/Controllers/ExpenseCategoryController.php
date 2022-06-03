<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Exports\ExpenseCategoryExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use App\Models\ExpenseCategory;
use Carbon\Carbon;
use Session;
use PDF;

class ExpenseCategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=ExpenseCategory::where('expcate_status',1)->orderBy('expcate_id','DESC')->get();
        return view('admin.expense-category.all',compact('all'));
    }

    public function add(){
        return view('admin.expense-category.add');
    }

    public function edit($slug){
        $data=ExpenseCategory::where('expcate_status',1)->where('expcate_slug',$slug)->firstOrFail();
        return view('admin.expense-category.edit',compact('data'));
    }

    public function view($slug){
        $data=ExpenseCategory::where('expcate_status',1)->where('expcate_slug',$slug)->firstOrFail();
        return view('admin.expense-category.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:255',
          ],[
            'name.required'=>'Please enter name!',
        ]);

        $slugName = Str::slug($request['name'], '-');
        $slug=time().'-'.$slugName;

        $insert=ExpenseCategory::insertGetId([
          'expcate_name'=>$request['name'],
          'expcate_remarks'=>$request['remarks'],
          'expcate_slug'=>$slug,
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
            Session::flash('success','value');
            return redirect('admin/expense/category/add');
        }else{
            Session::flash('error','value');
            return redirect('admin/expense/category/add');
        }
    }

    public function update(Request $request){

        $id=$request['id'];
        $slugName = Str::slug($request['name'], '-');
        $slug=time().'-'.$slugName;
        

        $update=ExpenseCategory::where('expcate_status',1)->where('expcate_id',$id)->update([
          'expcate_name'=>$request['name'],
          'expcate_remarks'=>$request['remarks'],
          'expcate_slug'=>$slug,
          'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($update){
            Session::flash('success','value');
            return redirect('admin/expense/category/view/'.$slug);
        }else{
            Session::flash('error','value');
            return redirect('admin/expense/category/edit/'.$slug);
        }
    }

    public function softdelete(Request $request) {
        $id=$request['modal_id'];
        $soft = ExpenseCategory::where('expcate_id',$id)->update(
            [
                'expcate_status' => 0
            ]
        );
        if($soft){
            Session::flash('success','value');
            return redirect('/admin/expense/category');
        }else{
            Session::flash('error','value');
            return redirect('/admin/expense/category');
        }
    }

    public function restore(Request $request){
        $id=$request['modal_id'];
        $restore = ExpenseCategory::where('expcate_status',0)->where('expcate_id',$id)->update([
            'expcate_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($restore){
            Session::flash('restore_success','value');
            return redirect('admin/recycle/expense/category');
          }else{
            Session::flash('restore_error','value');
            return redirect('admin/recycle/expense/category');
          }
    }

    public function delete(Request $request) {
        $id=$request['modal_id'];
        $delete = ExpenseCategory::where('expcate_id',$id)->delete(
            [
                'expcate_status' => 0
            ]
        );
        if($delete){
            Session::flash('delete_success','value');
            return redirect('admin/recycle/expense/category');
        }else{
            Session::flash('delete_error','value');
            return redirect('admin/recycle/expense/category');
        }
    }

    public function pdf(){
        $all=ExpenseCategory::where('expcate_status',1)->orderBy('expcate_id','DESC')->get();
        $pdf = PDF::loadView('admin.expense-category.pdf', compact('all'));
        return $pdf->download('expenseCategory.pdf');
    }

    public function excel(){
        return Excel::download(new ExpenseCategoryExport, 'ExpenseCategory.xlsx');
    }




}
