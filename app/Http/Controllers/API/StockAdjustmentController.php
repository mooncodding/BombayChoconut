<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StockAdjustment;
use App\Models\StockAdjustmentDetail;
use Carbon\Carbon;

class StockAdjustmentController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'permission:stock_adjustments']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */

    public function index(Request $request)
    {
        //Initial Declaration
        $stock_adjustment = StockAdjustment::with('createdBy', 'updatedBy', 'stockAdjustmentDetails', 'stockAdjustmentDetails.stockAdjustment', 'stockAdjustmentDetails.product');
        //Check if there is any string in search

        if ($request->search != "") {
            $stock_adjustment = $stock_adjustment->where(function ($query) use ($request) {
                $query->where('date', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('reference', 'LIKE', '%' . $request->search . '%');
            });
        }
        //Check if user requested a sort
        if ($request->sortBy != "") {
            if ($request->sortDesc != "" && $request->sortDesc == "true") {
                $orderType = "desc";
            } else {

                $orderType = "asc";
            }
            $stock_adjustment = $stock_adjustment->orderBy($request->sortBy, $orderType);
        } else {
            //Default Sorting
            $stock_adjustment = $stock_adjustment->orderBy("id", "desc");
        }
        //Check if pagination or all records
        if (isset($request->numRows) && $request->numRows > 0) {
            return $stock_adjustment->paginate($request->numRows);
        } else {
            return $stock_adjustment->get();
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
        //check if user & organization has right to perform this action
        if (auth()->user()->can('create_stock_adjustment')) {

            $this->validate($request, [
                'stock_adjustment_details.*.product_id' => 'required',
                'stock_adjustment_details.*.product_quantity' => 'required',
                'stock_adjustment_details.*.type' => 'required',
            ]);

            $stockAdjustment = new StockAdjustment;
            $stockAdjustment->reference ='STOCKADJ/'.(StockAdjustment::max('id')+001).'/'.date('y');
            if ($request->date != "") {
                $stockAdjustment->date = Carbon::parse($request->date)->toDateString();
            }
            $stockAdjustment->notes = $request->notes;
            $stockAdjustment->created_at = Carbon::now();
            $stockAdjustment->created_by = auth()->user()->id;
            $stockAdjustment->save();

            foreach ($request->stock_adjustment_details as $row) {

                $detail = new StockAdjustmentDetail;
                $detail->stock_adjustment_id = $stockAdjustment->id;
                $detail->product_id = $row['product_id'];
                $detail->product_quantity = $row['product_quantity'];
                $detail->type = $row['type'];
                $stockAdjustment->stockAdjustmentDetails()->save($detail);
            }

            return response()->json("Record created successfully", 200);
        } else {
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
        //check if user & organization has right to perform this action
        if (auth()->user()->can('edit_stock_adjustment')) {

            $stockAdjustment = StockAdjustment::findOrFail($id);
            $this->validate($request, [
                'stock_adjustment_details.*.product_id' => 'required',
                'stock_adjustment_details.*.product_quantity' => 'required',
                'stock_adjustment_details.*.type' => 'required',
            ]);

            foreach ($request->stock_adjustment_details as $row) {

                $findData = StockAdjustmentDetail::where('id', $row['id']);
                if ($findData->get()->count() > 0) {
                    $findData->update([
                        "product_id" => $row['product_id'],
                        "product_quantity" => $row['product_quantity'],
                        "type" => $row['type'],
                        "updated_at"=> Carbon::now(),
                    ]);
                } else {
                    $detail = new StockAdjustmentDetail;
                    $detail->stock_adjustment_id = $id;
                    $detail->product_id = $row['product_id'];
                    $detail->product_quantity = $row['product_quantity'];
                    $detail->type = $row['type'];
                    $stockAdjustment->stockAdjustmentDetails()->save($detail);
                }
            }
            if ($request->date != $stockAdjustment->date) {
                $request->merge(['date' => Carbon::parse($request['date'])->toDateString()]);
            }
            
            $stockAdjustment->updated_by = auth()->user()->id;
            $stockAdjustment->update($request->all());

            return response()->json("Record updated successfully", 200);
        } else {
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
        //check if user & organization has right to perform this action
        if (auth()->user()->can('delete_stock_adjustment')) {

            $stockAdjustment = StockAdjustment::findOrFail($id);
            $stockAdjustment->stockAdjustmentDetails()->delete();
            $stockAdjustment->delete();

            return response()->json("Record deleted successfully", 200);
        } else {
            return response()->json("Unauthorized", 401);
        }
    }

    public function removeStockAdjustmentDetail($id)
    {
        //check if user & organization has right to perform this action
        if (auth()->user()->can('delete_stock_adjustment')) {

            $stockAdjustmentDetail = StockAdjustmentDetail::findOrFail($id);
            $stockAdjustmentDetail->delete();
            
            return response()->json("Record deleted successfully", 200);
        } else {
            return response()->json("Unauthorized", 401);
        }
    }
}
