<?php 
namespace App\Traits;

use App\Models\UserToken;
use Exception;
use ExpoSDK\Expo;
use ExpoSDK\ExpoMessage;

trait PushNotification
{
    // Send Push Notifications
    public function sendPushNotifications($title,$content,$sendTo){

        $message = (new ExpoMessage([
            'title' =>  $title,
            'body' => $content,
        ]))
        ->setChannelId('default')
        ->setBadge(1)
        ->playSound();
        if ($sendTo == 'allUsers'){
            //Get All App User Devices Token
            $userToken = UserToken::all();
        }else{
            //Get User Devices Token
            $userToken = UserToken::where('user_id',$sendTo)->get();
        }
        // When token's is exist
       if(count($userToken) > 0){
            $notificationToken = [];
            foreach ($userToken as $item) {
                $item = json_decode($item);
                array_push($notificationToken, $item->token);
            } 
            //Calculation
            $chunkValue = 95;
            $count = count($notificationToken);
            $length = $count/$chunkValue;
            $length = ceil($length);
            $sendArray = [];
            $sendArray2 = [];
            $var = 0;
            // Tokens Conditions Work
            for ($i=0; $i < $length; $i++) {
                if($i == 0)
                {
                    $sendArray = array_slice($notificationToken,0, $chunkValue);
                    try {
                    (new Expo())->send($message)->to($sendArray)->push();
                } catch (Exception $th) {
                    continue;
                }
                    $var = (($i+1)*$chunkValue);
                }
                else
                {
                    $sendArray2 = [];
                    $sendArray2 = array_slice($notificationToken,$var, $chunkValue);
                    try {
                    (new Expo())->send($message)->to($sendArray2)->push();
                } catch (Exception $th) {
                    continue;
                }
                    $var = (($i+1)*$chunkValue);
                }
            }
       }
       
    }

}