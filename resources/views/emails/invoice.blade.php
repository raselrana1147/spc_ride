<body bgcolor="#f8f8fa">
<table>
  <tr>
    <td>&nbsp</td>
  </tr>
</table>

<div class="email_template" style="width: 500px; margin: 0px auto;background: rgba(255,255,255);box-shadow: 0px 0px 5px rgba(51,51,51,0.3);font-family: 'Proxima-Nova',Helvetica Neue, Helvetica, Arial, sans-serif;">
<table align="center" class="head" width="70%";>
  <tr>
    <td style="padding-top: 20px;"></td>
  </tr>
  <tr>
    <td  align="center"><img src="{{ config('constants.site_logo', asset('logo-black.png')) }}" height="90px"></td>
    
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
<table align="center" class="temp_b" width="85%" style="text-align: center;">
  <tr>
    <td>
    <font size="5" color="#000">@lang('user.invoice.invoice')</font>
    </td>
  </tr>
  
  <tr>
    <td style="padding-top: 10px;"></td>
  </tr>
  <tr>
    <td><img src="{{$message->embed(public_path().'/asset/mail-img/title_underline.png')}}" width="80%"></td>
  </tr>
  <tr>
    <td>&nbsp</td>
  </tr>
</table>
<table align="center" class="temp_b" width="85%" style="text-align: center;">
  <tr>
    <td width="50%" align="left">
      <h2>@lang('user.invoice_mail.driver')</h2>
      <img src="{{$message->embed(public_path().'/asset/mail-img/tie.png')}}" style="height: 60px">
      
    </td>
    <td width="50%" align="right">
      <h2>@lang('user.invoice_mail.customer')</h2>
      <img src="{{$message->embed(public_path().'/asset/mail-img/tie.png')}}" style="height: 60px">
      
    </td>
  </tr>
  <tr>
    <td style="vertical-align: top;padding-top: 15px;" align="left">
      <h4>{{$Email->provider->first_name}} {{$Email->provider->last_name}}</h4>
    </td>
    <td style="padding-top: 15px" align="right">

      <h4 style="margin: 7px">@lang('user.name'): {{$Email->user->first_name}} {{$Email->user->last_name}}</h4>
      <h4 style="margin: 7px">@lang('user.email'): {{$Email->user->email}}</h4>
      <h4 style="margin: 7px">@lang('user.mobile'): {{$Email->user->mobile}}</h4>
      <h4 style="margin: 7px">@lang('user.booking_id'): {{$Email->booking_id}}</h4>
    </td>
  </tr>

</table>
<table>
  <tr>
    <td style="padding: 5px"></td>
  </tr>
</table>
<table align="center" class="temp_b" width="85%" style="text-align: center;">
  <tr>
    <td><img src="{{$message->embed(public_path().'/asset/mail-img/title_underline.png')}}" width="80%"></td>
  </tr>
</table>
<table>
  <tr>
    <td style="padding: 5px"></td>
  </tr>
</table>
<table align="center" class="temp_b" width="85%">
  <tr>
    <td width="50%" align="left"><font size="4"><b>@lang('user.description')</b></font></td>
    <td width="50%" align="right"><font size="4"><b>@lang('user.amount')</b></font></td>
  </tr>
  <tr>
    <td style="padding: 4px"></td>
  </tr>
  <tr>
    <td width="50%" align="left"><font size="=3">@lang('user.ride.base_price')</font></td>
    <td width="50%" align="right"><font size="3">{{$Email->payment->fixed}} {{config('constants.currency','$')}}</font></td>
  </tr>

  <tr>
    <td width="50%" align="left"><font size="=3">@lang('user.ride.distance_price')</font></td>
    <td width="50%" align="right"><font size="3">

      @if($Email->service_type->calculator=='MIN')
        {{$Email->payment->minute}} {{config('constants.currency','$')}}
      @endif
      @if($Email->service_type->calculator=='HOUR')
        {{$Email->payment->hour}} {{config('constants.currency','$')}}
      @endif
      @if($Email->service_type->calculator=='DISTANCE')
        {{$Email->payment->distance}} {{config('constants.currency','$')}}
      @endif
      @if($Email->service_type->calculator=='DISTANCEMIN')
        {{$Email->payment->minute+$Email->payment->distance}} {{config('constants.currency','$')}}
      @endif
      @if($Email->service_type->calculator=='DISTANCEHOUR')
        {{$Email->payment->hour+$Email->payment->distance}} {{config('constants.currency','$')}}
      @endif

    </font></td>
  </tr>

    @if($Email->payment->discount)  
  <tr>
    <td width="50%" align="left"><font size="=3">@lang('user.invoice_mail.discount')</font></td>
    <td width="50%" align="right"><font size="3">{{$Email->payment->discount }} {{config('constants.currency','$')}}</font></td>
  </tr> 
    @endif

    @if($Email->payment->tips)  
  <tr>
    <td width="50%" align="left"><font size="=3">@lang('user.ride.tips')</font></td>
    <td width="50%" align="right"><font size="3">{{$Email->payment->tips }} {{config('constants.currency','$')}}</font></td>
  </tr> 
    @endif


  <tr>
    <td width="50%" align="left"><font size="3">@lang('user.ride.tax_price')</font></td>
    <td width="50%" align="right"><font size="3">{{$Email->payment->tax }} {{config('constants.currency','$')}}</font></td>
  </tr>
  <tr>
    <td width="50%" align="left"><font size="=3">@lang('user.ride.total')</font></td>
    <td width="50%" align="right"><font size="3">{{$Email->payment->total-$Email->payment->discount+$Email->payment->tips }} {{config('constants.currency','$')}}</font></td>
  </tr>
</table>
<table>
  <tr>
    <td style="padding: 5px"></td>
  </tr>
</table>
<table align="center" class="temp_b" width="85%" style="text-align: center;">
  <tr>
    <td><img src="title_underline.png" width="80%"></td>
  </tr>
</table>
<table>
  <tr>
    <td style="padding: 5px"></td>
  </tr>
</table>
<table align="center" class="temp_b" width="85%" style="text-align: center;">
  <tr>
    <td style="color: #e10613"><font size="5">@lang('user.invoice_mail.visit_web')</font></td>
  </tr>
</table>
<table>
  <tr>
    <td style="padding: 5px"></td>
  </tr>
</table>
<table align="center" class="temp_b" width="100%" style="text-align: center; background: #e00612">
  <tr>
    <td>&nbsp</td>
  </tr>
  <tr>
    <td  align="left" style="padding: 10px">
      <span><a href="{{config('constants.store_facebook_link','#')}}" title="Facebook" target="_blank">  <img src="{{$message->embed(public_path().'/asset/mail-img/facebook@2x.png')}}" alt="Facebook" title="Facebook" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important"></a></span>
      <span><a href="{{config('constants.store_twitter_link','#')}}" title="Twitter" target="_blank"> <img src="{{$message->embed(public_path().'/asset/mail-img/twitter@2x.png')}}" alt="Twitter" title="Twitter" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important"></a></span>
      
    </td>
    <td>
      <p style="color:#fff; font-size: 15px">@lang('user.mobile') : {{ config('constants.contact_number', '+9197911 01817')  }}</p>
    </td>
    <td align="right" style="padding: 10px;font-size: 15px">
      <a href="" style="color: #fff">{{url('/')}}</a>
    </td>
  </tr>
  <tr>
    <td>&nbsp</td>
  </tr>
</table>  
  

</div>
</body>