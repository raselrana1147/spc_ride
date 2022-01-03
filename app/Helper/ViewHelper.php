<?php

use App\PromocodeUsage;
use App\ServiceType;
use Twilio\Rest\Client;
use Twilio\Exceptions\TwilioException;

function currency($value = '')
{

  if(config('constants.currency')=='CFA')
  {
    if($value == ""){
      return number_format(0, 2, '.', '').' '.config('constants.currency');
    } else {
      return number_format($value, 2, '.', '').' '.config('constants.currency');
    }
  }
  else{

    	if($value == ""){
    		return config('constants.currency').number_format(0, 2, '.', '');
    	} else {
    		return config('constants.currency').number_format($value, 2, '.', '');
    	}
  }
}

function is_in_polygon($points_polygon, $vertices_x, $vertices_y, $longitude_x, $latitude_y)
{
  $i = $j = $c = 0;
  for ($i = 0, $j = $points_polygon-1 ; $i < $points_polygon; $j = $i++) {
    if ( (($vertices_y[$i] > $latitude_y != ($vertices_y[$j] > $latitude_y)) &&
    ($longitude_x < ($vertices_x[$j] - $vertices_x[$i]) * ($latitude_y - $vertices_y[$i]) / ($vertices_y[$j] - $vertices_y[$i]) + $vertices_x[$i]) ) ) 
        $c = !$c;
  }
  return $c;
}

function distance($value = '')
{
    if($value == ""){
        return "0 ".config('constants.distance', 'Kms');
    }else{
        return $value." ".config('constants.distance', 'Kms');
    }
}

function img($img){
	if($img == ""){
		return asset('main/avatar.jpg');
	}else if (strpos($img, 'http') !== false) {
        return $img;
    }else{
		return asset('storage/'.$img);
	}
}

function image($img){
	if($img == ""){
		return asset('main/avatar.jpg');
	}else{
		return asset($img);
	}
}

function promo_used_count($promo_id)
{
	return PromocodeUsage::where('status','USED')->where('promocode_id',$promo_id)->count();
}

function curl($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $return = curl_exec($ch);
    curl_close ($ch);
    return $return;
}

function get_all_service_types()
{
	return ServiceType::all();
}

function demo_mode(){
	if(\Setting::get('demo_mode', 0) == 1) {
        return back()->with('flash_error', 'Disabled for demo purposes! Please contact us at info@appdupe.com');
    }
}

function get_all_language()
{
	return array('en'=>'English','ar'=>'Arabic','fr'=>'French');
}

function sendSMS($mobileno, $otp){
  \Log::info("Twilio MObile".$mobileno. '---' .$otp);
  
    $status = '';

    if($otp == 'ride'){

      $message = "Your Ride Started";

    }else{
      $message = "Your Verification Code: ". $otp ."";

    }

   
    $accountSid = config('constants.twilio_accountsid');
    $authToken = config('constants.twilio_token');
    $twilioNumber = config('constants.twilio_mobile');
    // $accountSid = Setting::get('twilio_accountsid');
    // $authToken = Setting::get('twilio_token');
    // $twilioNumber = Setting::get('twilio_mobile');
    // $accountSid = 'AC89e6bba763d69543ed598424735dd02e';
    // $authToken = '5a5c24ce2475e3020df43d1981ea8316';
    // $twilioNumber = '+12028662277';
    // dd($twilioNumber);
    $client = new Client($accountSid, $authToken);
    try {
      $client->messages->create(
          $mobileno,
          [
              "body" => $message,
              "from" => $twilioNumber
          ]);
      return $status = "success";
      
    }catch (TwilioException $e) {
      \Log::info($e->getMessage());

      return $e->getMessage();
      // return response()->json(['error'=> $e->getMessage()]);
      Log::info(
          'Could not send SMS notification.' .
          ' Twilio replied with: ' . $e
          );
    }
}



function sendTwilioSMS($mobileno, $otp){
    \Log::info("MObile".$mobileno. '---' .$otp);
  
    $status = '';

    if($otp == 'ride'){
      $message = "Your Ride Started";
    }else{
      $message = "Your Verification Code: ". $otp ."";
    }

   
    $username = config('constants.twilio_accountsid');
    $password = config('constants.twilio_token');
    $sender = config('constants.twilio_mobile');

    try {
     
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "http://api.icombd.com/api/v1/campaigns/sendsms/plain?username=".$username."&password=".$password."&sender=".$sender."&text=".urlencode($message)."&to=".$mobileno,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 3000,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "cache-control: no-cache"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);
      curl_close($curl);
      return $status = "success";
      
    }catch (Exception $e) {
      return $e->getMessage();
  
    }
}