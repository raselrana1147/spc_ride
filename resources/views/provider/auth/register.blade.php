@extends('provider.layout.auth')

@section('content')
<div class="col-md-12">
    <a class="log-blk-btn" href="{{ url('/provider/login') }}">@lang('provider.signup.already_register')</a>
    <h3>@lang('provider.signup.sign_up')</h3>
</div>

<div class="col-md-12">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/provider/register') }}">

        <div id="first_step">
            <div class="col-md-4">
                <input value="+880" type="text" placeholder="+880" id="country_code" name="country_code" />
            </div> 
            
            <div class="col-md-8">
                <input type="phone" autofocus id="phone_number" class="form-control" placeholder="@lang('provider.signup.enter_phone')" name="phone_number" value="{{ old('phone_number') }}" data-stripe="number" maxlength="10" onkeypress="return isNumberKey(event);"/>
            </div>

            <div class="col-md-12 exist-msg" style="display: none;">
                <span class="help-block">
                        <strong id="err-msg"></strong>
                </span>
            </div>

            <div class="col-md-8">
                @if ($errors->has('phone_number'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone_number') }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-md-12">
                <a href="#" class="log-teal-btn verify_number">Verify Phone Number</a>
            </div>

            <div style="display: none;" id="otp">

                <div class="col-md-12" >
                    <input id="otp" type="text" class="form-control"  placeholder="OTP" name="otp" required autocomplete="off" value="">
                <input id="check_otp" type="hidden" name="check_otp" value="">
                   
                </div>

                <div class="col-md-12 invalid-otp" style="display: none;">
                    <span class="help-block">
                            <strong>Invalid OTP!!</strong>
                    </span>
                </div>
               
                <div class="col-md-12 verifyotp">
                    <a href="#" class="log-teal-btn verify_otp">Verify OTP</a>
                </div>

            </div>
        </div>

        {{ csrf_field() }}

        <div id="second_step" style="display: none;">
            <div>
                <input id="fname" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="@lang('provider.profile.first_name')" autofocus data-validation="alphanumeric" data-validation-allowing=" -" data-validation-error-msg="@lang('provider.profile.first_name') can only contain alphanumeric characters and . - spaces">
                @if ($errors->has('first_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                @endif
            </div>
            <div>
                <input id="lname" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="@lang('provider.profile.last_name')"data-validation="alphanumeric" data-validation-allowing=" -" data-validation-error-msg="@lang('provider.profile.last_name') can only contain alphanumeric characters and . - spaces">            
                @if ($errors->has('last_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
            </div>
            <div>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="@lang('provider.signup.email_address')" data-validation="email">            
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div>
                <label class="checkbox-inline"><input type="checkbox" name="gender" value="MALE" data-validation="checkbox_group" data-validation-qty="1" data-validation-error-msg="Please choose one gender">@lang('provider.signup.male')</label>
                <label class="checkbox-inline"><input type="checkbox" name="gender" value="FEMALE" data-validation="checkbox_group" data-validation-qty="1" data-validation-error-msg="Please choose one gender">@lang('provider.signup.female')</label>
                @if ($errors->has('gender'))
                    <span class="help-block">
                        <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                @endif
            </div>                        
            <div>
                <input id="password" type="password" class="form-control" name="password" placeholder="@lang('provider.signup.password')" data-validation="length" data-validation-length="min6" data-validation-error-msg="Password should not be less than 6 characters">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>    
            <div>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="@lang('provider.signup.confirm_password')" data-validation="confirmation" data-validation-confirm="password" data-validation-error-msg="Confirm Passsword is not matched">

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div> 

            @if (config('constants.paypal_adaptive') == 1)
            <div>
                <input id="service-model" type="text" class="form-control" name="paypal_email" value="{{ old('paypal_email') }}" placeholder="@lang('provider.profile.paypal_email')" data-validation="email">
                
                @if ($errors->has('paypal_email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('paypal_email') }}</strong>
                    </span>
                @endif
            </div>
            <span class="help-block">
                        <strong style="color: red; font-size: 10spx;">Please add verified Paypal Email, otherwise you won't receive the payment.</strong>
                    </span>
            @endif

            <div>
                <select class="form-control" name="service_type" id="service_type" data-validation="required">
                    <option value="">Select Service</option>
                    @foreach(get_all_service_types() as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>

                @if ($errors->has('service_type'))
                    <span class="help-block">
                        <strong>{{ $errors->first('service_type') }}</strong>
                    </span>
                @endif
            </div>
            <div>
                <input id="service-number" type="text" class="form-control" name="service_number" value="{{ old('service_number') }}" placeholder="@lang('provider.profile.car_number')" data-validation="alphanumeric" data-validation-allowing=" -" data-validation-error-msg="@lang('provider.profile.car_number') can only contain alphanumeric characters and - spaces">
                
                @if ($errors->has('service_number'))
                    <span class="help-block">
                        <strong>{{ $errors->first('service_number') }}</strong>
                    </span>
                @endif
            </div>
            <div>
                <input id="service-model" type="text" class="form-control" name="service_model" value="{{ old('service_model') }}" placeholder="@lang('provider.profile.car_model')" data-validation="alphanumeric" data-validation-allowing=" -" data-validation-error-msg="@lang('provider.profile.car_model') can only contain alphanumeric characters and - spaces">
                
                @if ($errors->has('service_model'))
                    <span class="help-block">
                        <strong>{{ $errors->first('service_model') }}</strong>
                    </span>
                @endif
            </div>

            @if(config('constants.referral') == 1)
                <div>
                    <input type="text" placeholder="Referral Code (Optional)" class="form-control" name="referral_code" >

                    @if ($errors->has('referral_code'))
                        <span class="help-block">
                            <strong>{{ $errors->first('referral_code') }}</strong>
                        </span>
                    @endif
                </div>
            @else
                <input type="hidden" name="referral_code" >
            @endif
            
            <button type="submit" class="log-teal-btn">
                @lang('provider.signup.register')
            </button>

        </div>
    </form>
</div>
@endsection


@section('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script type="text/javascript">
    $.validate({
        modules : 'security',
    });
    $('.checkbox-inline').on('change', function() {
        $('.checkbox-inline').not(this).prop('checked', false);  
    });
    function isNumberKey(evt)
    {   
        var edValue = document.getElementById("phone_number");
        var s = edValue.value;
        if (event.keyCode == 13) {
            event.preventDefault();
            if(s.length>=10){
                smsLogin();
            }
        }
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode != 46 && charCode > 31 
        && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }

</script>
<script>
$(document).ready(function() {    
    // phone form submission handler
    $('.verify_number').click(function() {
        
        $('.exist-msg').hide();

        var countryCode = document.getElementById("country_code").value;
        var phoneNumber = document.getElementById("phone_number").value;

        $.ajax({
            type:"POST",
            url:"{{url('/provider/send/otp')}}",
            data:{'mobile':phoneNumber , 'country_code' : countryCode,'_token': '{{ csrf_token() }}'},
            success : function(results) {
                console.log(results);

                $('.verify_number').hide();

                $('#otp').show();

                if(results.status == 'success'){
                    $('.verify_number').hide();

                    $('.exist-msg').hide();

                    $('#otp').show();

                    $('input[name="check_otp"]').val(results.otp);

                }else{

                    $('.verify_number').show();

                    $('#otp').hide();
                    $('.exist-msg').show();
                    $("#err-msg").text(results.message);
                    
                }

            },

            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);

                $('.exist-msg').show();
                $("#err-msg").text(xhr.responseJSON.message);
                
            }
        }); 
  
    });


    $('.verify_otp').click(function() {
      
        var otp_check = $('input[name="check_otp"]').val();
        
        var otp_entered = $('input[name="otp"]').val();
        
        if(otp_check == otp_entered){
           
            $('#phone_number').attr('readonly',true);
            $('#country_code').attr('readonly',true);
            $('#otp').hide();
            $('#second_step').show();
        }else{

            $('.invalid-otp').show();
        }
  
    });
});

</script>

@endsection 

            
