<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">
    <title>Admin Login | Wall-ID</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <style type="text/css">
        html, body{
            font-family: 'Poppins', sans-serif !important;
            overflow-x: hidden !important;
            scroll-behavior: smooth !important;
            background-color: #dfb6ff;
            padding: 20px 10px;
        }
        .login-content{
            background-color: #fff;
            width: 100%;
            padding: 50px 50px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.274);
        }
        .login-content img{
            padding-bottom: 20px;
        }
        .login-content .form-title{
            font-size: 20px;
            color: #000;
            font-weight: 600;
        }
        .login-content .line-rule{
            width: 100px;
            height: 2px;
            background-color: #9B18FC;
            margin: auto;
            margin-top: -10px;
            margin-bottom: 40px;
        }
        .login-content label{
            text-align: left;
            display: block;
            font-size: 16px;
            font-weight: 500;
            padding-bottom: 5px;
        }
        .login-content input{
            width: 100%;
            padding: 10px 10px;
            margin-bottom: 30px;
            border-radius: 5px;
            border: none;
            border: 1px solid #450477;
        }
        .login-content input:not([type="submit"]):focus, textarea:focus, select:focus, select:focus {    
            border: 2px solid #7406c2;    
            outline:none;
        }
        .login-content .login-btn{
            background-color: #8705e4;
            border: none;
            color: #fff;
            border-radius: 5px;
            transition: 0.5s;
        }
        .login-content .login-btn:hover{
            border: 1px solid #450477;
            color: #450477;
            background-color: #45047700;
        }
        .login-content .forgot-password{
            margin-top: -15px;
            font-size: 14px;
        }
        @media (max-width: 456px){
            body{
                padding: 20px 2px;
            }
            .login-content{
                padding: 50px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6">
                <div class="login-content text-center">
                    <img src="/images/logo.png" width="170px" alt="Wall-ID Logo">
                    <p class="form-title">Login to have access to your dashboard</p>
                    <div class="line-rule"></div>
                    <form  method="POST" action="/admin/login">

                        @csrf
                        
                        <!-- Wall ID Number or Email Here -->
                        <div>
                            <label for="full name">Wall-ID Email</label>
                            <input type="email" name="email" required placeholder="Enter your Email" class=" @error('email') is-invalid @enderror">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password Here -->
                        <div>
                            <label for="password">Password</label>
                            <input type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="********">    
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Login Button Here -->
                        <div>
                            <input type="submit" class="login-btn" value="Login">
                        </div>

                        <!-- Forgot Password Here -->
                        <div class="forgot-password d-none">
                            <p>Forgot password? <a href="#">Contact your admin</a></p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-3"></div>
        </div>
    </div>
</body>
</html>