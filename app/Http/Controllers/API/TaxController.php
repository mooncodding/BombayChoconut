<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tax;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware(['auth', 'permission:taxes']);
    }

    public function index(Request $request)
    {
        //Declare a global variable with relation orders!
        $taxRate=Tax::with(['createdBy','updatedBy']);
        
        //Check if there is any search value
        if($request->search!=""){
            $taxRate->where(function($query) use($request) {
                $query->where( 'name', 'LIKE', '%' . $request->search . '%' )
                ->orWhere( 'code', 'LIKE', '%' . $request->search . '%' )
                ->orWhere( 'rate', 'LIKE', '%' . $request->search . '%' )
                ->orWhere( 'type', 'LIKE', '%' . $request->search . '%' );
            });
        }

        //Check in any type of sorting
        if($request->sortBy!=""){
            //If the sorting is not related to Relations
            $taxRate=$taxRate->orderBy($request->sortBy, ($request->sortDesc=="true")?"desc":"asc");
        }else{
            //Default Sorting
            $taxRate=$taxRate->orderBy("id", "desc");
        }
        //Pagination
        if(isset($request->numRows) && $request->numRows>0){
            return $taxRate->paginate($request->numRows);
        }else{
            return $taxRate->get();
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
        if(auth()->user()->can('create_tax')){
            $this->validate($request, [
                'name'=>'required|string|max:64',
                'rate'=>'required',
                'type'=>'required|string|max:64',
            ]);

            $taxRate=Tax::create([
                'name'=>$request->name,
                'code'=>$request->code,
                'rate'=>$request->rate,
                'type'=>$request->type,
                'created_at'=>Carbon::now(),
                'created_by' => Auth::user()->id,
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
        if(auth()->user()->can('edit_tax')){
            $taxRate = Tax::findOrfail($id);
            $this->validate($request, [
                'name'=>'required|string|max:64',
                'rate'=>'required',
                'type'=>'required|string|max:64',
            ]);

            $taxRate->update([
                'name'=>$request->name,
                'code'=>$request->code,
                'rate'=>$request->rate,
                'type'=>$request->type,
                'updated_at'=>Carbon::now(),
                'updated_by' => Auth::user()->id,
            ]);

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
        if(auth()->user()->can('delete_tax')){
            $taxRate = Tax::findOrFail( $id);
            $taxRate->delete();
            return response()->json("Record deleted successfully", 200);
        }else{
            return response()->json("Unauthorized", 401);
        }
    }
}
