<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\GeneralPushNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\PushNotification; // Trait
class GeneralPushNotificationController extends Controller
{
    use PushNotification; // Trait
    public function __construct(){
        $this->middleware(['auth', 'permission:general_push_notifications']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notification =  GeneralPushNotification::with(['createdBy','updatedBy']);
        $notification = $notification->orderBy('id','desc');
        $notification = $notification->get();
        return $notification;
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
        if(auth()->user()->can('create_general_push_notification')){
            $request->validate([
                "title"=>"required",
                "content"=>"required",
                "is_schedule"=>"nullable",
                "date_time"=>"required_if:is_schedule,1",
            ]);
            
            $notification = new GeneralPushNotification();
            $notification->title = $request->title;
            $notification->content = $request->content;
            $notification->flag = 1;
            $notification->is_schedule = $request->is_schedule;
            //Date Time Condition 
            if ($request->is_schedule == 1) {
                $notification->flag = 0;
                $notification->date_time = Carbon::parse($request->date_time)->toDateTimeString();
            }else{
                $this->sendPushNotifications($notification->title,$notification->content,'allUsers');
            }
            $notification->created_at = Carbon::now();
            $notification->created_by = Auth::user()->id;
            $notification->save();
           
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
        if(auth()->user()->can('edit_general_push_notification')){
            $notification = GeneralPushNotification::findOrfail($id);
            $request->validate([
                "title"=>"required",
                "content"=>"required",
                "is_schedule"=>"nullable",
                "date_time"=>"required_if:is_schedule,1",
            ]);
            if($request->date_time!=$notification->date_time){
                $request->merge(['date_time'=>Carbon::parse($request['date_time'])->toDateTimeString()]);
            }
            $notification->title = $request->title;
            $notification->content = $request->content;
            $notification->is_schedule = $request->is_schedule;
            //Date Time Condition 
            if ($request->is_schedule == 1) {
                $notification->flag = 0;
                $notification->date_time = Carbon::parse($request->date_time)->toDateTimeString();
            }else{
                $notification->date_time = Carbon::now('Africa/Nairobi');
                $notification->flag = 1;
                $this->sendPushNotifications($notification->title,$notification->content,'allUsers');
            }
            $notification->updated_by = Auth::user()->id;
            $notification->save();
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
        if(auth()->user()->can('delete_general_push_notification')){
            $notification = GeneralPushNotification::findOrFail($id);
            $notification->delete();
            return response()->json("Record deleted successfully", 200);
        }else{
            return response()->json("Unauthorized", 401);
        }
    }
}
