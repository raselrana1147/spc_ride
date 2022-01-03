<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Provider;
use App\ProviderDevice;
use Exception;
use Log;
use Setting;
use App;

use NotificationChannels\WebPush\WebPushMessage;
use NotificationChannels\WebPush\WebPushChannel;
use App\Notifications\WebPush;

use Edujugon\PushNotification\PushNotification;

class SendPushNotification extends Controller
{
	/**
     * New Ride Accepted by a Driver.
     *
     * @return void
     */
    public function RideAccepted($request){

        $user = User::where('id',$request->user_id)->first();
        $language = $user->language;
        App::setLocale($language);
        $sound = 'accepted';
    	return $this->sendPushToUser($request->user_id, trans('api.push.request_accepted'), $sound);
    }

    /**
     * Driver Arrived at your location.
     *
     * @return void
     */
    public function user_schedule($user){
         $user = User::where('id',$user)->first();
         $language = $user->language;
         App::setLocale($language);
         $sound = 'started';
        return $this->sendPushToUser($user, trans('api.push.schedule_start'), $sound);
    }

    /**
     * New Incoming request
     *
     * @return void
     */
    public function provider_schedule($provider){

        $provider = Provider::where('id',$provider)->with('profile')->first();
        if($provider->profile){
            $language = $provider->profile->language;
            App::setLocale($language);
        }

        $sound = 'started';

        return $this->sendPushToProvider($provider, trans('api.push.schedule_start'), $sound);

    }

    /**
     * New Ride Accepted by a Driver.
     *
     * @return void
     */
    public function UserCancellRide($request){

        if(!empty($request->provider_id)){

            $provider = Provider::where('id',$request->provider_id)->with('profile')->first();

            if($provider->profile){
                $language = $provider->profile->language;
                App::setLocale($language);
            }

            return $this->sendPushToProvider($request->provider_id, trans('api.push.user_cancelled'));
        }
        
        return true;    
    }

    public function ProviderWaiting($user_id, $status){

        $user = User::where('id',$user_id)->first();
        $language = $user->language;
        App::setLocale($language);

        if($status == 1) {
            return $this->sendPushToUser($user_id, trans('api.push.provider_waiting_start'));  
        } else {
            return $this->sendPushToUser($user_id, trans('api.push.provider_waiting_end')); 
        }
        
    }


    /**
     * New Ride Accepted by a Driver.
     *
     * @return void
     */
    public function ProviderCancellRide($request){

        $user = User::where('id',$request->user_id)->first();
        $language = $user->language;
        App::setLocale($language);

        return $this->sendPushToUser($request->user_id, trans('api.push.provider_cancelled'));
    }

    /**
     * Driver Arrived at your location.
     *
     * @return void
     */
    public function Arrived($request){

        $user = User::where('id',$request->user_id)->first();
        $language = $user->language;
        App::setLocale($language);

        $sound = 'arrived';

        return $this->sendPushToUser($request->user_id, trans('api.push.arrived'), $sound);
    }

    /**
     * Driver Picked You  in your location.
     *
     * @return void
     */
    public function Pickedup($request){
        $user = User::where('id',$request->user_id)->first();
        $language = $user->language;
        App::setLocale($language);

        $sound = 'pickedup';

        return $this->sendPushToUser($request->user_id, trans('api.push.pickedup'), $sound);
    }

    /**
     * Driver Reached  destination
     *
     * @return void
     */
    public function Dropped($request){

        $user = User::where('id',$request->user_id)->first();
        $language = $user->language;
        App::setLocale($language);

        $sound = 'dropped';

        return $this->sendPushToUser($request->user_id, trans('api.push.dropped').config('constants.currency').$request->payment->total.' by '.$request->payment_mode, $sound);
    }

    /**
     * Your Ride Completed
     *
     * @return void
     */
    public function Complete($request){

        $user = User::where('id',$request->user_id)->first();
        $language = $user->language;
        App::setLocale($language);

        $sound = 'completed';

        return $this->sendPushToUser($request->user_id, trans('api.push.complete'), $sound);
    }

    
     
    /**
     * Rating After Successful Ride
     *
     * @return void
     */
    public function Rate($request){

        $user = User::where('id',$request->user_id)->first();
        $language = $user->language;
        App::setLocale($language);

        return $this->sendPushToUser($request->user_id, trans('api.push.rate'));
    }


    /**
     * Money added to user wallet.
     *
     * @return void
     */
    public function ProviderNotAvailable($user_id){
        $user = User::where('id',$user_id)->first();
        $language = $user->language;
        App::setLocale($language);

        return $this->sendPushToUser($user_id,trans('api.push.provider_not_available'));
    }

    /**
     * New Incoming request
     *
     * @return void
     */
    public function IncomingRequest($provider){

        $provider = Provider::where('id',$provider)->with('profile')->first();
        if($provider->profile){
            $language = $provider->profile->language;
            App::setLocale($language);
        }

        $sound = "searching";
Log::info('provider push log for incoming request');
Log::info($provider->id);
        return $this->sendPushToProvider($provider->id, trans('api.push.incoming_request'), $sound);

    }
    

    /**
     * Driver Documents verfied.
     *
     * @return void
     */
    public function DocumentsVerfied($provider_id){

        $provider = Provider::where('id',$provider_id)->with('profile')->first();
        if($provider->profile){
            $language = $provider->profile->language;
            App::setLocale($language);
        }

        return $this->sendPushToProvider($provider_id, trans('api.push.document_verfied'));
    }


    /**
     * Money added to user wallet.
     *
     * @return void
     */
    public function WalletMoney($user_id, $money){

        $user = User::where('id',$user_id)->first();
        $language = $user->language;
        App::setLocale($language);
        return $this->sendPushToUser($user_id, $money.' '.trans('api.push.added_money_to_wallet'));
    }

    public function ProviderWalletMoney($user_id, $money){

        $user = Provider::where('id',$user_id)->first();
        $language = $user->language;
        App::setLocale($language);

        return $this->sendPushToProvider($user_id, $money.' '.trans('api.push.added_money_to_wallet'));
    }

    /**
     * Money charged from user wallet.
     *
     * @return void
     */
    public function ChargedWalletMoney($user_id, $money){

        $user = User::where('id',$user_id)->first();
        $language = $user->language;
        App::setLocale($language);

        return $this->sendPushToUser($user_id, $money.' '.trans('api.push.charged_from_wallet'));
    }


    public function provider_hold($provider_id){

        $provider = Provider::where('id',$provider_id)->with('profile')->first();
        if($provider->profile){
            $language = $provider->profile->language;
            App::setLocale($language);
        }

        return $this->sendPushToProvider($provider_id, trans('api.push.provider_status_hold'));

    }

    /**
     * Sending Push to a user Device.
     *
     * @return void
     */
    public function sendPushToUser($user_id, $push_message, $sound="default", $type=null){

        try{

           

            $user = User::findOrFail($user_id);

            //$user->notify(new WebPush("Notifications", $push_message, url('/')));

            if($user->device_token != ""){


                if($user->device_type == 'ios'){
                     if(env('IOS_USER_ENV')=='development'){
                        $crt_user_path=app_path().'/apns/user/user.pem';
                        $crt_provider_path=app_path().'/apns/provider/provider.pem';
                        $dry_run = true;
                    }
                    else{
                        $crt_user_path=app_path().'/apns/user/user.pem';
                        $crt_provider_path=app_path().'/apns/provider/provider.pem';
                        $dry_run = false;
                    }
                    
                   $push = new PushNotification('apn');

                    $push->setConfig([
                            'certificate' => $crt_user_path,
                            'passPhrase' => env('IOS_USER_PUSH_PASS', 'apple'),
                            'dry_run' => $dry_run
                        ]);

                    if($type == null ){

                        $send=  $push->setMessage([
                                'aps' => [
                                    'alert' => [
                                        'body' => $push_message
                                    ],
                                    'sound' => $sound.'.caf',
                                    'badge' => 1

                                ],
                                'extraPayLoad' => [
                                    'custom' => $push_message
                                ]
                            ])
                            ->setDevicesToken($user->device_token)->send();
                        }else{
                            $send=  $push->setMessage([
                                'aps' => [
                                    'alert' => [
                                        'body' => $push_message
                                    ],
                                    'sound' => $sound.'.caf',
                                    'badge' => 1

                                ],
                                'extraPayLoad' => [
                                    'custom' => array('type' => 'chat')
                                ]
                            ])
                            ->setDevicesToken($user->device_token)->send();

                        }

                    return $send;

                }elseif($user->device_type == 'android'){

                    $push = new PushNotification('fcm');

                    if($type == null){
                        $send=  $push->setMessage(['message'=>$push_message,'sound'=>$sound])
                        ->setDevicesToken($user->device_token)->send();
                    }else{

                        \Log::info("User Chat======".$push_message);
                        
                        $send =  $push->setMessage([
                                           // 'notification' => [
                                           //         'message' => $push_message
                                           //         ],
                                           //  'message'=> $push_message,
                                            'data' => [
                                                   'type' => 'chat',
                                                   'message'=> $push_message
                                                   ]
                                            ])
                        ->setDevicesToken($user->device_token)->send();
                    }
                   
                    return $send;

                }
            }
            


        } catch(Exception $e){
            return $e;
        }

    }


    /**
     * Sending Push to a user Device.
     *
     * @return void
     */
    public function sendPushToProvider($provider_id, $push_message, $sound="default", $type=null){

        try{          


            $provider = ProviderDevice::where('provider_id',$provider_id)->with('provider')->first();           


            if($provider->token != ""){

                if($provider->type == 'ios'){

                    if(env('IOS_USER_ENV')=='development'){
                        $crt_user_path=app_path().'/apns/user/user.pem';
                        $crt_provider_path=app_path().'/apns/provider/provider.pem';
                        $dry_run = true;
                    }
                    else{
                        $crt_user_path=app_path().'/apns/user/user.pem';
                        $crt_provider_path=app_path().'/apns/provider/provider.pem';
                        $dry_run = false;
                    }

                   $push = new PushNotification('apn');
                   $push->setConfig([
                            'certificate' => $crt_provider_path,
                            'passPhrase' => env('IOS_PROVIDER_PUSH_PASS', 'apple'),
                            'dry_run' => $dry_run
                        ]);

                    if($type == null ){
                       $send=  $push->setMessage([
                                'aps' => [
                                    'alert' => [
                                        'body' => $push_message
                                    ],
                                    'sound' => $sound.'.caf',
                                    'badge' => 1

                                ],
                                'extraPayLoad' => [
                                    'custom' => $push_message
                                ]
                            ])
                            ->setDevicesToken($provider->token)->send();
                    }else{

                        $send=  $push->setMessage([
                                'aps' => [
                                    'alert' => [
                                        'body' => $push_message
                                    ],
                                    'sound' => $sound.'.caf',
                                    'badge' => 1

                                ],
                                'extraPayLoad' => [
                                    'custom' => array('type' => 'chat')
                                ]
                            ])
                            ->setDevicesToken($provider->token)->send();

                    }
                  
                    return $send;

                }elseif($provider->type == 'android'){
                    
                   $push = new PushNotification('fcm');
Log::info($push);
                    if($type == null){
                        
                        $send=  $push->setMessage(['message'=>$push_message,'sound'=>$sound])
                        ->setDevicesToken($provider->token)->send();
                        Log::info('sent');
                    }else{

                        \Log::info("Provider Chat======".$push_message);

                        $send = $push->setMessage([
                                           // 'notification' => [
                                           //         'message' => $push_message
                                           //         ],
                                           'data' => [
                                                   'type' => 'chat',
                                                   'message'=> $push_message
                                                   ]
                                           ])
                                    ->setDevicesToken($provider->token)->send();
                    }
                    
                    return $send;
                        

                }
            }

        } catch(Exception $e){           
            return $e;
        }

    }

}
