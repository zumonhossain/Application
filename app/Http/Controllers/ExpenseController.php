<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExpenseExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use Carbon\Carbon;
use Session;
use PDF;

class ExpenseController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Expense::where('expense_status',1)->orderBy('expense_id','DESC')->get();
        return view('admin.expense.all',compact('all'));
    }

    public function add(){
        return view('admin.expense.add');
    }

    public function edit($slug){
        $data=Expense::where('expense_status',1)->where('expense_slug',$slug)->firstOrFail();
        return view('admin.expense.edit',compact('data'));
    }

    public function view($slug){
        $data=Expense::where('expense_status',1)->where('expense_slug',$slug)->firstOrFail();
        return view('admin.expense.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'details' => 'required|string|max:255',
            'amount' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'category' => 'required|string|max:255',
          ],[
            'details.required'=>'Please enter name!',
            'amount.required'=>'Please enter name!',
            'date.required'=>'Please enter name!',
            'category.required'=>'Please enter name!',
        ]);

        $slugName = Str::slug($request['details'], '-');
        $slug=time().'-'.$slugName;

        $insert=Expense::insertGetId([
          'expense_details'=>$request['details'],
          'expense_amount'=>$request['amount'],
          'expense_date'=>$request['date'],
          'expcate_id'=>$request['category'],
          'expense_slug'=>$slug,
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
            Session::flash('success','value');
            return redirect('admin/expense/add');
        }else{
            Session::flash('error','value');
            return redirect('admin/expense/add');
        }
        
    }

    public function update(Request $request){

        $id=$request['id'];
        $slugName = Str::slug($request['details'], '-');
        $slug=time().'-'.$slugName;
        

        $update=Expense::where('expense_status',1)->where('expense_id',$id)->update([
          'expense_details'=>$request['details'],
          'expense_amount'=>$request['amount'],
          'expense_date'=>$request['date'],
          'expcate_id'=>$request['category'],
          'expense_slug'=>$slug,
          'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($update){
            Session::flash('success','value');
            return redirect('admin/expense/view/'.$slug);
        }else{
            Session::flash('error','value');
            return redirect('admin/expense/edit/'.$slug);
        }
    }

    public function softdelete(Request $request) {
        $id=$request['modal_id'];
        $soft = Expense::where('expense_id',$id)->update(
            [
                'expense_status' => 0
            ]
        );
        if($soft){
            Session::flash('success','value');
            return redirect('/admin/expense');
        }else{
            Session::flash('error','value');
            return redirect('/admin/expense');
        }
    }

    public function restore(Request $request){
        $id=$request['modal_id'];
        $restore = Expense::where('expense_status',0)->where('expense_id',$id)->update([
            'expense_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($restore){
            Session::flash('restore_success','value');
            return redirect('admin/recycle/expense');
          }else{
            Session::flash('restore_error','value');
            return redirect('admin/recycle/expense');
          }
    }

    public function delete(Request $request) {
        $id=$request['modal_id'];
        $delete = Expense::where('expense_id',$id)->delete(
            [
                'expense_status' => 0
            ]
        );
        if($delete){
            Session::flash('delete_success','value');
            return redirect('admin/recycle/expense');
        }else{
            Session::flash('delete_error','value');
            return redirect('admin/recycle/expense');
        }
    }

    public function pdf(){
        $all=Expense::where('expense_status',1)->orderBy('expense_id','DESC')->get();
        $pdf = PDF::loadView('admin.expense.pdf', compact('all'));
        return $pdf->download('Expense.pdf');
    }


    public function excel(){
        return Excel::download(new ExpenseExport, 'Expense.xlsx');
    }















}
