<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\StockEntry;
use App\Models\StockEntryDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockEntryController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'permission:stock_entries']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return StockEntry::with(['stockEntryDetails.product','createdBy','updatedBy'])->orderBy('id', 'desc')->get();
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
        if(auth()->user()->can('create_stock_entry'))
        {
            $this->validate($request,[
                'stock_entry_date'=>'required',
                'stock_entry_details.*.product_id' => 'required',
                'stock_entry_details.*.total_quantity' => 'required',
                'notes'=>'nullable',
            ]);
            $stockEntries =  new StockEntry();
            $stockEntries->reference ='STOCK/'.(StockEntry::max('id')+001).'/'.date('y');
            $stockEntries->stock_entry_date = Carbon::parse($request->stock_entry_date)->toDateString();
            $stockEntries->notes = $request->notes;
            $stockEntries->created_by = Auth::user()->id;
            $stockEntries->created_at = Carbon::now();
            $stockEntries->save();
            // Stock Entries Details
            if ($stockEntries) {
                foreach ($request->stock_entry_details as  $data) {
                    // Save StockEntry Detail 
                    $stockEntryDetails = new StockEntryDetail();
                    $stockEntryDetails->stock_entry_id = $stockEntries->id;
                    $stockEntryDetails->product_id = $data['product_id'];
                    $stockEntryDetails->total_quantity = $data['total_quantity'];
                    $stockEntryDetails->save();
                   
                }
            }
            
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
        if(auth()->user()->can('edit_stock_entry')){
            $stockEntries = StockEntry::findOrfail($id);
            $this->validate($request,[
                'stock_entry_date'=>'required',
                'stock_entry_details.*.product_id' => 'required',
                'stock_entry_details.*.total_quantity' => 'required',
                'notes'=>'nullable',
            ]);

            // update the stockEntry date
            if($request->stock_entry_date!=$stockEntries->stock_entry_date){
              $request->merge(['stock_entry_date'=>Carbon::parse($request['stock_entry_date'])->toDateString()]);
            }
            // update the stockEntries
            $stockEntries->update([
                'stock_entry_date'=> Carbon::parse($request->stock_entry_date)->toDateString(),
                'notes'=>$request->notes,
                'updated_by'=> Auth::user()->id,
                'updated_at'=> Carbon::now(),
            ]);
            // Update the StockEntries details
            if ($stockEntries) {
                foreach ($request->stock_entry_details as  $data) {
                    $stockEntryDetails =  StockEntryDetail::where('id',$data['id']);
                    if ($stockEntryDetails->get()->count() >0 ) {
                        // Update the existing stockEntry details record
                        $stockEntryDetails->update([
                            'product_id'=> $data['product_id'],
                            'total_quantity'=> $data['total_quantity'],
                        ]);
                    } else {
                            // Save StockEntry Detail 
                            $stockEntryDetails = new StockEntryDetail();
                            $stockEntryDetails->stock_entry_id = $stockEntries->id;
                            $stockEntryDetails->product_id = $data['product_id'];
                            $stockEntryDetails->total_quantity = $data['total_quantity'];
                            $stockEntryDetails->save();
                        }
                }
            }

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
        if(auth()->user()->can('delete_stock_entry'))
        {
            $stockEntries = StockEntry::findOrFail($id);
            $stockEntries->stockEntryDetails()->delete();
            $stockEntries->delete();
            return response()->json("Record deleted successfully", 200);
        }else{
            return response()->json("Unauthorized", 401);
        }
    }
    //Remove StockEntryDetail  
    public function removeStockEntryDetail($id)
    {
        // delete the StockEntryDetail  
        $stockEntryDetail = StockEntryDetail::findOrfail($id);
        $stockEntryDetail->delete();
        return response()->json("Record deleted successfully", 200);
    }
}
