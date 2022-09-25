<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="Noor-games">
    <meta name="author" content="Noor-games">
    <meta name="keywords" content="Noor-games">
    <meta content="" name="Noor-games">
    <meta content="" name="Noor-games">
    <!-- Favicons -->
    <link href="{{ URL::to('/images/logochangecolor.gif') }}" rel="icon">
    <link href="{{ URL::to('/images/logochangecolor.gif') }}" rel="apple-touch-icon">
    <!-- Title Page-->
    <title>Noor-games</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Icons font CSS-->
    <!-- Font special for pages-->
    <!-- Vendor CSS-->
    {{-- <link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/datepicker/daterangepicker.css') }}" rel="stylesheet" media="all"> --}}
    <!-- Main CSS-->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('css/my.css') }}" rel="stylesheet" media="all">
    <link href="https://unpkg.com/smartwizard@5/dist/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" type="text/css" />
    <style>
        @media screen and (max-width: 576px) {
         #myVideo {
         position: fixed;
         right: -8%;
         top: 0;
         height: 100vh;
         }
         .form-image-dragon-mobile{
         position: absolute;
         top: 110px;
         left: 70px;
         }
         .card-mobile{
         height: 800px;
         }
         .new-step-wizard{
         margin-top: 150px;
         }
         .smartwizard{
         left: -30px;
         width: 120%;
         }
         .tab-content{
         padding: 10px 5px 0 10px;
         }
         .rainbow {
         left: -35px;
         width: 280px;
         }
         }
      </style>
    <style>
        * {
         box-sizing: border-box;
         }
         body {
         background-color: #f1f1f1;
         }
         .modal-backdrop-bg {
         background-image: url({{asset('images/bgStars.jpg')}});
         }
         .modal-header{
         border:none;
         }
         .modal-cross{
         font-family: 'neon_planetdisplay', Arial, sans-serif;
         animation: color-change 2s infinite;
         color: #fff;
         letter-spacing: 2px;
         font-size: 65px;
         }
         #regForm {
         /*background-color: #ffffff;*/
         /*margin: 100px auto;*/
         font-family: Raleway;
         padding: 0 40px 0px 40px;
         /*width: 70%;*/
         min-width: 300px;
         }
         h1 {
         text-align: center;  
         }
         /* Mark input boxes that gets an error on validation: */
         input.invalid {
         background-color: #ffdddd;
         }
         /* Hide all steps by default: */
         .tab {
         display: none;
         }
         .tab-pane{
            padding: 20px;
         }
         /*#prevBtn {*/
         /*  background-color: #bbbbbb;*/
         /*}*/
         /* Make circles that indicate the steps of the form: */
         .step {
         height: 15px;
         width: 15px;
         margin: 0 2px;
         background-color: #0b6bf7;
         border: none;  
         border-radius: 50%;
         display: inline-block;
         opacity: 0.5;
         }
         .step.active {
         opacity: 1;
         }
         /* Mark the steps that are finished and valid: */
         .step.finish {
         background-color: #004cbb;
         }
         .modal-header-text{
         font-family: 'neon_planetdisplay', Arial, sans-serif;
         padding: 20px;
         animation: color-change 2s infinite;
         color: #fff;
         letter-spacing: 2px;
         text-decoration: underline;
         }
         .modal-content{
         box-shadow: 0 0 2px #006aff, 0 0 4px #006aff, 0 0 6px #006aff, 0 0 8px #006aff, 0 0 10px #006aff, 0 0 12px #006aff, 0 0 14px #006aff, 0 0 16px #006aff;
         }
         .numberText{
         font-family: "NeonPlanetDisplay;!important";
         font-size: 20px;
         }
         .neon_planetdisplay{
         font-family: 'neon_planetdisplay', Arial, sans-serif;
         }
         .inline-block
         {
         display: inline-block;
         }
         .font-size-20
         {
         font-size: 20px;
         }
         button:focus
         {
         outline: none;
         }
         .overflow-hidden
         {
         overflow: hidden;
         }
         .active-tab
         {
         transform: translateX(0);
         }
         .inactive-tab
         {
         transform: translateX(120%);
         transition: transform ease-out 0.3s;
         }
         .input-form-modal{
         border: 1px solid;
         border-radius: 10px;
         padding: 10px 10px 10px 10px;
         }
         .input--style-1:focus{
         color: #fff;
         }
         .card-1{
         background-color: rgb(0 0 0 / 76%) !important;
         }
         .display-none{
         display:none!important;
         }
         /*.main-header-text{*/
         /*background-color: none!important;*/
         /*}*/
         @keyframes rotate {
         100% {
         transform: rotate(1turn);
         }
         }
         .rainbow {
         position: relative;
         z-index: 0;
         border-radius: 10px;
         overflow: hidden;
         }
         .rainbow::before {
         content: '';
         position: absolute;
         z-index: -2;
         left: -50%;
         top: -50%;
         width: 200%;
         height: 200%;
         /*background-color: #399953;*/
         background-repeat: no-repeat;
         background-size: 50% 50%, 50% 50%;
         background-position: 0 0, 100% 0, 100% 100%, 0 100%;
         background-image: 
         linear-gradient(#f11b7e, #f11b7e), 
         linear-gradient(#0032fb, #0032fb), 
         linear-gradient(#0032fb, #0032fb),
         linear-gradient(#f11b7e, #f11b7e), 
         linear-gradient(#0032fb, #0032fb),
         linear-gradient(#f11b7e, #f11b7e), 
         linear-gradient(#0032fb, #0032fb),
         linear-gradient(#f11b7e, #f11b7e);             
         animation: rotate 4s linear infinite;
         }
         .rainbow::after {
         content: '';
         position: absolute;
         z-index: -1;
         left: 6px;
         top: 6px;
         width: calc(100% - 12px);
         height: calc(100% - 12px);
         border-radius: 5px;
         background:black;
         }
         .select2-results__options{
             background:black;
         }
         .select2-selection__rendered{
                 font-family: 'neon_planetdisplay', Arial, sans-serif;
                color: #fff!important;
    text-shadow: 0 0 2px #dc3545, 0 0 4px #dc3545, 0 0 6px #dc3545, 0 0 8px #dc3545, 0 0 10px #dc3545, 0 0 12px #dc3545, 0 0 14px #dc3545, 0 0 16px #dc3545;
         
             
         }
         .select2-results__options li{
                 font-family: 'neon_planetdisplay', Arial, sans-serif;
                color: #fff;
    text-shadow: 0 0 2px #dc3545, 0 0 4px #dc3545, 0 0 6px #dc3545, 0 0 8px #dc3545, 0 0 10px #dc3545, 0 0 12px #dc3545, 0 0 14px #dc3545, 0 0 16px #dc3545;
         }
        .select2-container{
            width:100%!important;
        }
      </style>
</head>

<body>
    <div class="page-wrapper font-robo">
        <video autoplay muted loop id="myVideo">
            <source src="{{asset('images/fin.mp4')}}" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
        <div class="page-wrapper font-robo">
            <div class="wrapper wrapper--w680">
                <div class="card card-1 py-5 card-mobile">
                    <div>
                        <div>
                            <h2 class="font-weight-bold text-center main-header-text">
                                Career
                            </h2>
                        </div>
                        <div class="mx-5" style="text-align: center;">
                            <h3 style="line-height:2rem;" class="neon-text font-weight-bold blink">
                                Join Us
                            </h3>
                        </div>
                        <div class="card-body p-5">
                            <div class="text-center logo form-image-dragon-mobile">
                                <img src="{{ asset('/images/dragonnn.gif') }}" width="220" height="250" class="w-auto">
                            </div>
                            <!--<h1 style="color:yellow; text-align:center" class="title">Welcome to Noor Games! :-D </br>Fill out the following form to get registered into our room. We will send you the <b>Monthly Match</b> based on the date you joined us as a loyal customer. </br> All the best!!!</h1>-->
                            <form method="post" id="regForm" action="{{ route('forms.saveForm') }}" enctype="multipart/form-data">
                                @csrf
                                
                                @if (session('error'))
                                    @if(is_array(session('error')))
                                        @foreach(session('error') as $error)
                                            <div class = "alert alert-danger alert-dismissible fade show" role = "alert" style=" background: red; color: white; ">
                                                {{ $error }}
                                                <button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close">
                                                    <i class = "ik ik-x"></i>
                                                </button>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class = "alert alert-danger alert-dismissible fade show" role = "alert" style=" background: red; color: white; ">
                                            {{ session('error') }}
                                            <button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close">
                                                <i class = "ik ik-x"></i>
                                            </button>
                                        </div>
                                    @endif
                            
                                @endif
                                @php
                                    $questions = App\Models\Question::get();
                                    $step_count = 1;
                                @endphp
                                <div class="rainbow new-step-wizard">
                                    <div id="smartwizard">
                                        <ul class="nav display-none">
                                            <li>
                                                <a class="nav-link" href="#step-1">
                                                    Step 1
                                                </a>
                                            </li>
                                            @foreach ($questions as $index => $item)
                                                @php
                                                    $step_count = $step_count+1;
                                                @endphp
                                                <li>
                                                    <a class="nav-link" href="#step-{{$step_count}}">
                                                        Step {{$step_count}}
                                                    </a>
                                                </li>
                                                
                                            @endforeach

                                            <li>
                                                <a class="nav-link" href="#step-{{$step_count+1}}">
                                                    Step {{$step_count+1}}
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="text-center" style="padding-top: 10px;">
                                                <p class="neon-text-danger display-none error-msg">Please enter your full name</p>
                                                <p class="neon-text-danger display-none error-msg-num">Please enter your phone number</p>
                                            </div>
                                            <div id="step-1" class="tab-pane" role="tabpanel" style="text-align: center;">
                                                <p class="neon-text neon_planetdisplay inline-block">
                                                   Your Full Name
                                                </p>
                                                </br></br>
                                                <div class="form-check">
                                                <input name="name" class="input-form-modal form-control form-control-lg input--style-1 transparent-input neon-text-danger input-name" type="text" value="{{old('name')}}" autocomplete="off" placeholder="Full Name" maxlength="30" required>
                                                <button style="margin-top: 10px;" type="button" class="button px-4 next-btn"><span class="neon-text">Next</span></button>
                                                </div>
                                                </br>
                                                <!-- <div class="form-check">
                                                    <input class="form-check-input back-btn" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                    <label class="form-check-label neon-text neon-text-danger" for="exampleRadios2">
                                                        No
                                                    </label>
                                                </div> -->
                                            </div>
                                            
                                            @php
                                                $step_count = 1;
                                            @endphp
                                            @foreach ($questions as $index => $item)
                                                @php
                                                    $step_count = $step_count+1;
                                                @endphp
                                                <div id="step-{{$step_count}}" class="tab-pane" role="tabpanel" style="text-align: center;">
                                                    {{-- <p class="neon-text neon_planet display inline-block">
                                                        
                                                    </p> --}}
                                                    <p class="numberText neon-text inline-block font-size-20">{{$item->question}}</p>
                                                    </br></br>
                                                    <div class="form-check">
                                                        @if ($item->type == 'image')
                                                            <input type="file" name="{{$item->name}}" class="input-form-modal form-control form-control-lg" required>
                                                            <button style="margin-top: 10px;" type="button" class="button px-4 next-btn"><span class="neon-text">Next</span></button>
                                                        @endif
                                                        @if ($item->type == 'string' && $item->yes_no == 0)
                                                            <input name="{{$item->name}}" class="input-form-modal form-control form-control-lg input--style-1 transparent-input neon-text-danger input-name" type="text" value="{{old('name')}}" autocomplete="off" maxlength="30" required>
                                                            <button style="margin-top: 10px;" type="button" class="button px-4 next-btn"><span class="neon-text">Next</span></button>        
                                                        @elseif($item->type == 'string' && $item->yes_no == 1)
                                                            <input type="hidden" name="{{$item->name}}" class="cash_app_send_limit" required>
                                                            <button type="button" class="btn btn-success neon-text next-btn yes-btn" data-input=".cash_app_send_limit">Yes</button>
                                                            <button class="btn btn-danger neon-text neon-text-danger no-btn next-btn" data-input=".cash_app_send_limit">No</button>
                                                        @endif
                                                    </div>
                                                    </br>
                                                </div>
                                                
                                            @endforeach
                                            <div id="step-8" class="tab-pane" role="tabpanel" style="text-align: center;">
                                                <p class="numberText neon-text neon_planetdisplay inline-block input-name-text">
                                                    Perfect what could be the best phone number to reach out to you?
                                                </p>
                                                </br></br>
                                                <input id="phone-number" class="input-form-modal form-control form-control-lg input--style-1 transparent-input neon-text-danger" type="tel" value="" autocomplete="off" placeholder="XXX-XXX-XXXX" name="phone_number" maxlength="10" required>
                                                <button style="margin-top: 10px;margin-left: 40px;" type="submit" class="button px-4 submit-btn"><span class="neon-text">Submit</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </br>
                            <div class="to-push to-push2">
                                <div class="text-center pt-3">
                                    <h4 style="line-height: 30px;"><b><span class="neon-text font-weight-bold">Copyright Noorgames</span> <span class="just-neon">© 2021</span> <span class="neon-text"> All Rights Reserved</span><b></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jquery JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- <script src="js/global.js"></script> --}}
    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/smartwizard@5/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" type="text/javascript"></script>
    <script src="js/jquery-input-mask-phone-number.min.js"></script>
    
    <!-- steps -->
    <script>
    $(document).ready(function() {
        // SmartWizard initialize
        $('#smartwizard').smartWizard({
            transition: {
                animation: 'slide-swing', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
                speed: '400', // Transion animation speed
                easing: '' // Transition animation easing. Not supported without a jQuery easing plugin
            },
            disabledSteps: [], // Array Steps disabled
            backButtonSupport: false,
            toolbarSettings: {
                toolbarPosition: 'bottom', // none, top, bottom, both
                toolbarButtonPosition: 'right', // left, right, center
                showNextButton: false, // show/hide a Next button
                showPreviousButton: false, // show/hide a Previous button
                toolbarExtraButtons: [] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
            }
        });
        $('.input-name').keyup(function(){
            // if($('.error-msg').hasClass('display-none')){
                $('.error-msg').addClass('display-none');
            // }
        });
        $(".next-btn").click(function() {
            var inputName = $('.input-name').val()
            if(inputName.length <= 0){
                $('.error-msg').removeClass('display-none');
            }else{
                $('.error-msg').addClass('display-none');
                $('#smartwizard').smartWizard("next"); 
                $('.input-name-text').html('Perfect '+$('.input-name').val()+' what could be the best phone number to reach out to you?');
            }
            
        });
        $(".yes-btn").click(function() { 
            var inputClass = $(this).data('input');
            if(inputClass != 'input'){
                $(inputClass).val('yes');
            }
            
        });
        $(".no-btn").click(function() { 
            var inputClass = $(this).data('input');
            if(inputClass != 'input'){
                $(inputClass).val('no');
            }
            
        });
        
        $(".back-btn").click(function() { $('#smartwizard').smartWizard("prev"); });
        // $("#state").change(function() { $('#smartwizard').smartWizard("next"); });
         function denyBtn() {
        $('.tab-content').html('<p style="font-size: 25px;">Thanks for considering to work with us.</p>');
    }
        

    });
    </script>
    <!-- state -->
    <script>
        $('#state').change(function(){
            $('#smartwizard').smartWizard("next"); 
        });
    </script>
    <!-- phone -->
    <script>
        $(function(){
            $('#phone-number').usPhoneFormat({
                format:'xxx-xxx-xxxx'
            });
        });
    </script>
    <!-- form submit validation -->
    <script>
        $('.submit-btn').click(function(e){
            e.stopImmediatePropagation();
            var form = $('#regForm');
            var inputName = $('.input-name').val()
            if(inputName.length <= 0){
                $('.error-msg').removeClass('display-none');
            }
            else{
                if($('#phone-number').val() == ''){
                    $('.error-msg-num').removeClass('display-none');
                }else{
                    console.log($('#phone-number').length);
                    form.submit();
                }
            }

        });
        $('#state').select2();
    </script>
</body>

</html>

</html>