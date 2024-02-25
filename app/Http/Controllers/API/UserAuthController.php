<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ResetPasswordModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Notifications\ResetPasswordNotification;
use Carbon\Carbon;
use Facade\FlareClient\Http\Response;
use MajorGrey\PrettyJson;

class UserAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return redirect()->back()->with('error','Invalid login details');
            
        }else{
            $user = User::where('email', $request['email'])->firstOrFail();
            
            if ($user) {
                return redirect('/my-account');
            }
        }
    }

    // Customer Register
    public function customerRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:64',
            'email' => 'required|string|email|max:64|unique:users',
            'password' => 'required|string|min:8',
            'photo' => 'nullable',
            'id_card_number' => 'required|string|unique:users',
            'mobile_number' => 'required|string|unique:users',
            'mobile_number_2' => 'nullable|string|unique:users',
            'mobile_number_3' => 'nullable|string|unique:users',
            'username' => 'required|string|unique:users',
        ]);
        
        $user = new User();
        $user->reference = 'CUSTOMER/' . (User::max('id') + 001) . '/' . date('y');
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);

        // If file exists in the request
        if ($files = $request->file('photo')) {
            // destination path
            $destinationPath = 'images/users/'; 
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $user->photo = $profileImage;
        }
        
        $user->id_card_number = $request->id_card_number;
        $user->mobile_number = $request->mobile_number;
        $user->mobile_number_2 = $request->mobile_number_2;
        $user->mobile_number_3 = $request->mobile_number_3;
        $user->address = $request->address;
        $user->company_name = $request->company_name;
        $user->nif = $request->nif;
        $user->stat = $request->stat;
        $user->cif = $request->cif;
        $user->rcs = $request->rcs;
        $user->city_id = $request->city_id;
        $user->assignRole(4);
        $user->save();
        return response()->json("Record created successfully", 200);
    }
    // //Forgot Reset Password Api
    // public function resetPassword(Request $request)
    // {
    //     $request->validate([
    //         'email'=>'required|email',
    //         'password'=>'required|string|min:8|confirmed',
    //     ]);
    //             $user = User::where('email',$request->email)->update([
    //             'password'=>Hash::make($request->password), 
    //             ]);

    //             if ($user) {
    //             return response([
    //                 'message'=>'Password reset Successfully'
    //             ]);
    //         }
    //         else{
    //             return response()->json("Unauthorized",401);
    //         }  
    // }

    // 
    public function updateAccount(Request $request)
    {
        $user = Auth::user();

        $user->update([
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'address'=> $request->address,
        ]);

        return redirect()->back()->with('success','Record updated successfully');
    }

    public function updatePassword(Request $request)
    {
        // Validate the form data
        $request->validate([
            'password' => 'required|min:8', // Add any other validation rules you need
            'password_confirmation' => 'required|same:password',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Update the user's password
        $user->update([
            'password' => Hash::make($request->input('password')),
        ]);

        // You may add a success message or redirect the user to another page
        return redirect()->back()->with('success', 'Password updated successfully');
    }
    // //Forgot verifyCode Api
    // public function verifyCode(Request $request)
    // {
    //     $request->validate([
    //         'code'=>'required',
    //     ]);
        
    //     $data = ResetPasswordModel::where('token_signature',hash('md5',$request->code))
    //     ->first();
    //     if ($data == null || $data->count()<= 0) {
    //         return response([
    //             'message'=>'Invalid verification code'
    //         ]);
    //     }
    //     if (Carbon::now()->greaterThan($data->expires_at)) {
    //         return response([
    //             'message'=>'The verification code is expired'
    //         ]);
    //     }
    //     return response([
    //         'message'=>'Code verified successfully'
    //     ]);
    // }
    // //Forgot Password Api
    // public function sendPasswordResetToken(Request $request)
    // {
    //     $request->validate([
    //         'email'=>'required',
    //     ]);
    //     $user = User::where('email', $request->email)->whereHas('roles',function($q)  {
    //         $q->where('roles.id', 2);
    //     })->first();
    //     if ($user) {
    //     do {
    //         $token = sprintf("%04d", mt_rand(1, 9999));
    //         $signature =hash('md5',$token);
    //         $exists = ResetPasswordModel::where([
    //         ['user_id', $user->id],
    //         ['token_signature', $signature]
    //         ])->exists();
    //     } while ($exists);
    //         try {
    //             $user->notify(new ResetPasswordNotification($token));
    //             $data = ResetPasswordModel::create([
    //                 "user_id"=>$user->id,
    //                 "token_signature"=>$signature,
    //                 "expires_at"=>Carbon::now()->addMinute(5),
    //             ]);
    //             if ($user) {
    //                 return response()->json($data);
    //             }
    //             else{
    //                 return response([
    //                     'message'=>'Failed'
    //                 ]);
    //             }
    //         } catch (\Throwable $th) {
    //             $this->error_message = $th->getMessage();
    //             return false;
    //         }
    //     }
    //     else{
    //         return response([
    //             'message'=>'Invalid Email'
    //         ]);
    //     }
    // }
    // //  update the user profile
    // public function updateProfile(Request $request)
    // {
    //     $user = User::findOrfail(auth('sanctum')->user()->id);
    //     if ($files = $request->file('photo')) {
    //         $destinationPath = 'images/users/'; // upload path
    //         $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
    //         $files->move($destinationPath, $profileImage);
    //         $update['photo'] = $profileImage;
    //         $user->photo=$profileImage;
    //     }
    //     // when password is already exist
    //     if($request['password']!=""){
    //         $request->merge(['password'=>Hash::make($request['password'])]);
    //     }

    //     $user->update($request->all());
        
    //     return response()->json([
    //         'message' => 'Record updated successfully',
    //         'user' => $user,
    //     ]);
    // }
}
