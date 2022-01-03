<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;

use Tymon\JWTAuth\Exceptions\JWTException;

use Auth;
use Setting;
use Notification;
use Validator;
use Socialite;

use Twilio\Rest\Client;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;
use Twilio\TwiML\VoiceResponse;
use Twilio\Jwt\Grants\VoiceGrant;

class TwilioVoiceCallController extends Controller
{

    protected $sid;
    protected $token;
    protected $key;
    protected $secret;
    protected $phone_no;
    protected $app_sid;

    public function __construct()
    {
        $this->sid = config('constants.twilio_accountsid');
        $this->token = config('constants.twilio_token');
        $this->key = config('constants.twilio_key');
        $this->secret = config('constants.twilio_secret');
        $this->phone_no = config('constants.twilio_mobile');
        $this->app_sid = config('constants.twilio_app_sid');
    }


    public function voiceaccesstoken(Request $request)
    {

        try{

            // A unique identifier for this user
            $identity = "user_".mt_rand(1111,9999);

            // $user_name = Auth::user()->first_name;

            $outgoingApplicationSid=$this->app_sid;

            \Log::debug("joined with identity:". $identity);
            $token = new AccessToken($this->sid, $this->key, $this->secret, 3600, $identity);

            $voiceGrant = new VoiceGrant();
            $voiceGrant->setOutgoingApplicationSid($outgoingApplicationSid);

            // Optional: add to allow incoming calls
            $voiceGrant->setIncomingAllow(true);

            // Add grant to token
            $token->addGrant($voiceGrant);

            \Log::info($token->toJWT());

            return response()->json(['access_token' => $token->toJWT()]);

        }catch (Exception $e) {
             return response()->json(['error' => trans('api.something_went_wrong')], 500);
        }
       
       


          
    }

    public function dial_number(Request $request)
    {

        try{

            $twilio_number = $this->phone_no;
            
            $to_number = $request->phone;

            $response = new VoiceResponse();
            $dial = $response->dial('', ['callerId' => $twilio_number]);
            $dial->number($to_number);

            return $response;
        }catch (Exception $e) {
             return response()->json(['error' => trans('api.something_went_wrong')], 500);
        }
    }
}
