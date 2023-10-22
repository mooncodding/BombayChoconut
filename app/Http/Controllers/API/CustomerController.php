<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'permission:customers']);
    }
    
    public function index(Request $request)
    {
        //Declare a global variable with relation orders!
        $customer=User::with(['permissions','city'=>function($query) use ($request) {
            if($request->sortBy=="city.name"){
              $query->orderBy('name', ($request->sortDesc=="true")?"desc":"asc");
            }
        },'createdBy','updatedBy'])->whereHas('roles', function($query){
            $query->where('roles.id',2);
            });
        //Check if there is any search value
        if($request->search!=""){
            $customer->where( 'name', 'LIKE', '%' . $request->search . '%' )
            ->orWhere('email', 'LIKE', '%' . $request->search . '%' )
            ->orWhere('id_card_number', 'LIKE', '%' . $request->search . '%' )
            ->orWhereHas('city', function($query) use ($request){
                $query->where('name', 'LIKE', '%' . $request->search . '%');
            });
        }
        //Check in any type of sorting
        if($request->sortBy!=""){
            //If the sorting is not related to Relations
            if($request->sortBy != 'roles[0].name' && $request->sortBy != 'city.name'){
                $customer=$customer->orderBy($request->sortBy, ($request->sortDesc=="true")?"desc":"asc");
            }
        }else{
            //Default Sorting
            $customer=$customer->orderBy("id", "desc");
        }
        //Pagination
        if(isset($request->numRows) && $request->numRows>0){
            return $customer->paginate($request->numRows);
        }else{
            return $customer->get();
        }
    }

    public function store(Request $request)
    {
        //
        if(auth()->user()->can('create_customer')){
            $this->validate($request, [
                'name' => 'required|string|max:64',
                'username' => 'required|string|unique:users',
                'company_name' => 'required|string|max:64',
                'address' => 'required',
                'city_id' => 'required',
                'email' => 'required|string|email|max:64|unique:users',
                'password' => 'required|string|min:8',
                'photo' => 'nullable',
                'id_card_number' => 'required|unique:users',
                'mobile_number' => 'required|unique:users',
                'mobile_number_2' => 'nullable|unique:users',
                'mobile_number_3' => 'nullable|unique:users',
            ]);

            if($request['photo']){
                $name=time().'.'.explode('/', explode(':', substr($request->photo,0,strpos($request->photo, ';')))[1])[1];
                \Image::make($request->photo)->save(public_path('images/users/').$name);
            }else{
                $name="profile.png";
            }

            $customer = new User();
            $customer->reference = 'CUSTOMER/' . (User::max('id') + 001) . '/' . date('y');
            $customer->name = $request->name;
            $customer->username = $request->username;
            $customer->photo=$name;
            $customer->email = $request->email;
            $customer->password = Hash::make($request->password);
            $customer->id_card_number = $request->id_card_number;
            $customer->mobile_number = $request->mobile_number;
            $customer->mobile_number_2 = $request->mobile_number_2;
            $customer->mobile_number_3 = $request->mobile_number_3;
            $customer->address = $request->address;
            $customer->company_name = $request->company_name;
            $customer->nif = $request->nif;
            $customer->stat = $request->stat;
            $customer->cif = $request->cif;
            $customer->rcs = $request->rcs;
            $customer->city_id = $request->city_id;
            $customer->assignRole(2);
            $customer->created_at = Carbon::now();
            $customer->created_by = Auth::user()->id;
            $customer->save();
            return response()->json("Record created successfully", 200);
        }else{
            return response()->json("Unauthorized", 401);
        }
    }

    public function update(Request $request, $id)
    {
        //
        if(auth()->user()->can('edit_customer')){
            $customer = User::findOrfail($id);
            $this->validate($request, [
                'name' => 'required|string|max:64',
                'username' => 'required|string|unique:users,username,'.$customer->id,
                'company_name' => 'required|string|max:64',
                'address' => 'required',
                'city_id' => 'required',
                'email'=>'required|string|email|max:64|unique:users,email,'.$customer->id,
                'password' => 'nullable|string|min:8',
                'photo' => 'nullable',
                'id_card_number' => 'required|string|unique:users,id_card_number,'.$customer->id,
                'mobile_number' => 'required|unique:users,mobile_number,'.$customer->id,
                'mobile_number_2' => 'nullable|unique:users,mobile_number_2,'.$customer->id,
                'mobile_number_3' => 'nullable|unique:users,mobile_number_3,'.$customer->id,
            ]);
            if($request['password']!=""){
                $request->merge(['password'=>Hash::make($request['password'])]);
            }
            if($request['photo']!=$customer->photo){
                $name=time().'.'.explode('/', explode(':', substr($request->photo,0,strpos($request->photo, ';')))[1])[1];
                $publicPath=public_path('images/users/'.$name);
                \Image::make($request->photo)->save($publicPath);
                if((file_exists(public_path('images/users/'.$customer->photo)))&&($customer->photo!="profile.png")){
                    @unlink(public_path('images/users/'.$customer->photo));
                }
                $request->merge(['photo'=>$name]);
            }
            $customer->updated_at = Carbon::now();
            $customer->updated_by = Auth::user()->id;
            $customer->update($request->all());
            return response()->json("Record updated successfully", 200);
        }else{
            return response()->json("Unauthorized", 401);
        }
    }

    public function destroy($id)
    {
        //
        if(auth()->user()->can('delete_customer')){
            $customer = User::findOrfail($id);
            //Delete the user
            if((file_exists(public_path('images/users/'.$customer->photo)))&&($customer->photo!="profile.png")){
                @unlink(public_path('images/users/'.$customer->photo));
            }
            $customer->delete();
            return response()->json("Record deleted successfully", 200);
        }else{
            return response()->json("Unauthorized", 401);
        }
    }
}
