<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware(['auth', 'permission:expenses']);
    }

    public function index(Request $request)
    {
        //Declare a global variable with relation orders!
        $expense=Expense::with(["paymentMethod", "createdBy", "updatedBy"]);
                
        //Check if there is any search value
        if($request->search!=""){
            $expense->where(function($query) use($request) {
                $query->where( 'name', 'LIKE', '%' . $request->search . '%' )
                ->orWhere( 'date', 'LIKE', '%' . $request->search . '%' )
                ->orWhere( 'amount', 'LIKE', '%' . $request->search . '%' )
                ->orWhereHas('paymentMethod', function ($query) use($request){
                    $query->where( 'name', 'LIKE', '%' . $request->search . '%' );
                })
                ->orWhereHas('createdBy', function ($query) use($request){
                    $query->where( 'name', 'LIKE', '%' . $request->search . '%' );
                })
                ;
            });
        }

        //Check in any type of sorting
        if($request->sortBy!=""){
            //If the sorting is not related to Relations
            $expense=$expense->orderBy($request->sortBy, ($request->sortDesc=="true")?"desc":"asc");
        }else{
            //Default Sorting
            $expense=$expense->orderBy("id", "desc");
        }
        //Pagination
        if(isset($request->numRows) && $request->numRows>0){
            return $expense->paginate($request->numRows);
        }else{
            return $expense->get();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if(auth()->user()->can('create_expense'))
        {
            $this->validate($request, [
                'name'=>'required|string|max:64',
                'amount'=>'required|regex:/^\d+(\.\d{1,2})?$/|max:64',
                'date' => 'required',
                'payment_method_id' => 'required',
            ]);

            Expense::create([
                'name'=>$request->name,
                'payment_method_id'=>$request->payment_method_id,
                'date'=> Carbon::parse($request->date)->toDateTimeString(),
                'amount'=>$request->amount,
                'notes'=>$request->notes,
                'created_by'=>Auth::user()->id,
            ]);

            return response()->json("Record created successfully", 200);
        }else{
            return response()->json("Unauthorized", 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(auth()->user()->can('edit_expense'))
        {
            $expense = Expense::findOrfail($id);
            $this->validate($request, [
                'name'=>'required|string|max:64',
                'amount'=>'required|regex:/^\d+(\.\d{1,2})?$/|max:64',
                'date' => 'required',
                'payment_method_id' => 'required',
            ]);

            if($request->date!=$expense->date){
                $request->merge(['date'=>Carbon::parse($request->date)->toDateTimeString()]);
            }
            
            $expense->updated_by=Auth::user()->id;
            $expense->update($request->all());

            return response()->json("Record updated successfully", 200);
        }else{
            return response()->json("Unauthorized", 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->can('delete_expense')){
            $expense = Expense::findOrFail( $id);
            $expense->delete();
            return response()->json("Record deleted successfully", 200);
        }else{
            return response()->json("Unauthorized", 401);
        }
    }
}
