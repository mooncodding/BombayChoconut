<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'permission:units']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Declare a global variable with relation orders!
        $unit=Unit::with(["createdBy", "updatedBy"]);
                
        //Check if there is any search value
        if($request->search!=""){
            $unit->where(function($query) use($request) {
                $query->where( 'name', 'LIKE', '%' . $request->search . '%' )
                ->orWhere( 'symbol', 'LIKE', '%' . $request->search . '%' );
            });
        }

        //Check in any type of sorting
        if($request->sortBy!=""){
            //If the sorting is not related to Relations
            $unit=$unit->orderBy($request->sortBy, ($request->sortDesc=="true")?"desc":"asc");
        }else{
            //Default Sorting
            $unit=$unit->orderBy("id", "desc");
        }
        //Pagination
        if(isset($request->numRows) && $request->numRows>0){
            return $unit->paginate($request->numRows);
        }else{
            return $unit->get();
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
        if(auth()->user()->can('create_unit'))
        {
            $this->validate($request, [
                'name'=>'required|string|max:64',
                'symbol'=>'required|string|max:64',
            ]);

            $unit=Unit::create([
                'name'=>$request->name,
                'symbol'=>$request->symbol,
                'created_by' => auth()->user()->id,
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
        if(auth()->user()->can('edit_unit'))
        {
            $unit = Unit::findOrfail($id);
            $this->validate($request, [
                'name'=>'required|string',
                'symbol'=>'required|string',
            ]);

            $unit->update([
                'name'=>$request->name,
                'symbol'=>$request->symbol,
                'updated_by' => auth()->user()->id,
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
        if(auth()->user()->can('delete_unit')){
            $unit = Unit::findOrFail( $id);
            $unit->delete();
            return response()->json("Record deleted successfully", 200);
        }else{
            return response()->json("Unauthorized", 401);
        }
    }
}
