<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\IncomeExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use App\Models\Income;
use App\Models\IncomeCategory;
use Carbon\Carbon;
use Session;
use PDF;

class IncomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Income::where('income_status',1)->orderBy('income_id','DESC')->get();
        return view('admin.income.all',compact('all'));
    }

    public function add(){
        return view('admin.income.add');
    }

    public function edit($slug){
        $data=Income::where('income_status',1)->where('income_slug',$slug)->firstOrFail();
        return view('admin.income.edit',compact('data'));
    }

    public function view($slug){
        $data=Income::where('income_status',1)->where('income_slug',$slug)->firstOrFail();
        return view('admin.income.view',compact('data'));
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

        $insert=Income::insertGetId([
          'income_details'=>$request['details'],
          'income_amount'=>$request['amount'],
          'income_date'=>$request['date'],
          'incate_id'=>$request['category'],
          'income_slug'=>$slug,
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
            Session::flash('success','value');
            return redirect('admin/income/add');
        }else{
            Session::flash('error','value');
            return redirect('admin/income/add');
        }
    }

    public function update(Request $request){

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

        $id=$request['id'];
        $slugName = Str::slug($request['details'], '-');
        $slug=time().'-'.$slugName;
        

        $update=Income::where('income_status',1)->where('income_id',$id)->update([
            'income_details'=>$request['details'],
            'income_amount'=>$request['amount'],
            'income_date'=>$request['date'],
            'incate_id'=>$request['category'],
            'income_slug'=>$slug,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($update){
            Session::flash('success','value');
            return redirect('admin/income/view/'.$slug);
        }else{
            Session::flash('error','value');
            return redirect('admin/income/edit/'.$slug);
        }
    }
    





    

    public function softdelete(Request $request) {
        $id=$request['modal_id'];
        $soft = Income::where('income_id',$id)->update(
            [
                'income_status' => 0
            ]
        );
        if($soft){
            Session::flash('success','value');
            return redirect('/admin/income');
        }else{
            Session::flash('error','value');
            return redirect('/admin/income');
        }
    }












    public function restore(Request $request){
        $id=$request['modal_id'];
        $restore = Income::where('income_status',0)->where('income_id',$id)->update([
            'income_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($restore){
            Session::flash('restore_success','value');
            return redirect('admin/recycle/income');
          }else{
            Session::flash('restore_error','value');
            return redirect('admin/recycle/income');
          }
    }

    public function delete(Request $request) {
        $id=$request['modal_id'];
        $delete = Income::where('income_id',$id)->delete(
            [
                'income_status' => 0
            ]
        );
        if($delete){
            Session::flash('delete_success','value');
            return redirect('admin/recycle/income');
        }else{
            Session::flash('delete_error','value');
            return redirect('admin/recycle/income');
        }
    }

    public function pdf(){
        $all=Income::where('income_status',1)->orderBy('income_id','DESC')->get();
        $pdf = PDF::loadView('admin.income.pdf', compact('all'));
        return $pdf->download('income.pdf');
    }

    public function excel(){
        return Excel::download(new IncomeExport, 'Income.xlsx');
    }

}
