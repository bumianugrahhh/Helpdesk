<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <title>Halaman Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('public/asset/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/asset/css/loginstyle.css')}}">
    
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('public/asset/img/fajarlogo.jpeg')}}">

</head>

<body>
    <div class="main">
        <div class="container a-container" id="a-container">
            <form class="user" id="a-user" method="post" action="{{ route('login') }}">
                @csrf
                <h2 class="form_title title">Selamat Datang, Login!</h2>
                
                <!-- Show Flash_msg -->
                                
                <span class="form_span">Masukkan Username dan Password Anda</span>
                <input class="form_input @error('username') is-invalid @enderror" value="{{ old('username') }}" name="username" id="username" type="text" placeholder="Username" autofocus="" autocomplete="username" required="">
                       @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                <input class="form_input @error('password') is-invalid @enderror" name="password" id="password" type="password" placeholder="Password" required="" autocomplete="current-password">
                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                <button class="form_button button submit" type="submit">LOGIN</button>
            </form></div>
        
        <div class="switch" id="switch-cnt">
            <div class="switch_circle"></div>
            <div class="switch_circle switch_circle--t"></div>
        
            <div class="switch_container" id="switch-c1">
                <h2 class="switch_title title">Hello Friend !</h2>
                <p class="switch_description description">
                    Selamat datang di website kami, Sampaikan keluhan anda tentang pelayanan yang kami berikan melalui 
                    website ini ! Kami akan membantu dengan senang hati.<br><br>
                    Contact us :
                </p>
                <div class="form_icons">
                    <img class="form_icon" src="{{asset('public/asset/img/fb1.svg')}}" alt="facebook">
                    <img class="form_icon" src="{{asset('public/asset/img/linkedin.svg')}}" alt="linkedin">
                    <img class="form_icon" src="{{asset('public/asset/img/whatsapp.svg')}}" alt="whatsapp">
                </div>
            </div>
        </div>
    </div>    
</body>
</html>
