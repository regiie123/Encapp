<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Encryption</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <header>
            <div class="title">
                <svg class="logo_start" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M14 9v2h-4v-2c0-1.104.897-2 2-2s2 .896 2 2zm10 3c0 6.627-5.373 12-12 12s-12-5.373-12-12 
                    5.373-12 12-12 12 5.373 12 12zm-8-1h-1v-2c0-1.656-1.343-3-3-3s-3 1.344-3 3v2h-1v6h8v-6z"/>
                </svg>
                <a href="#" class="logo">Multiple Encryption</a>
            </div>
                <nav>
                    
                    <svg class="close" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="m12.002 2.005c5.518 0 9.998 4.48 9.998 9.997 0 5.518-4.48 9.998-9.998 9.998-5.517 0-9.997-4.48-9.997-9.998 
                        0-5.517 4.48-9.997 9.997-9.997zm0 8.933-2.721-2.722c-.146-.146-.339-.219-.531-.219-.404 0-.75.324-.75.749 0 .193.073.384.219.531l2.722 
                        2.722-2.728 2.728c-.147.147-.22.34-.22.531 0 .427.35.75.751.75.192 0 .384-.073.53-.219l2.728-2.728 2.729 2.728c.146.146.338.219.53.219.401 
                        0 .75-.323.75-.75 0-.191-.073-.384-.22-.531l-2.727-2.728 2.717-2.717c.146-.147.219-.338.219-.531 0-.425-.346-.75-.75-.75-.192 0-.385.073-.531.22z" 
                        fill-rule="nonzero"/>
                    </svg>

                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact</a></li>
                        @if (Route::has('register'))
                            <li>
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif

                    </ul>

                </nav>

            <svg class="menu" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 1024 1024">
                    <path fill="white" d="M160 448a32 32 0 0 1-32-32V160.064a32 32 0 0 1 
                    32-32h256a32 32 0 0 1 32 32V416a32 32 0 0 1-32 32H160zm448 0a32 32 0 0 
                    1-32-32V160.064a32 32 0 0 1 32-32h255.936a32 32 0 0 1 32 32V416a32 32 0 0 
                    1-32 32H608zM160 896a32 32 0 0 1-32-32V608a32 32 0 0 1 32-32h256a32 32 0 0 1 
                    32 32v256a32 32 0 0 1-32 32H160zm448 0a32 32 0 0 1-32-32V608a32 32 0 0 1 32-32h255.936a32 
                    32 0 0 1 32 32v256a32 32 0 0 1-32 32H608z"/>
            </svg>

        </header>  
    </div>

    <div class="login-box">
            <div class="allcontainer">
                <img src="images/login1.svg" width="220px"  alt="ewan" class="center">

                <div class="container">

                    <div class="input-box">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <label for="email">Email Address: </label>
                            <input type="text" id="email" placeholder="Enter Email Address" name="email" required>
                            
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <label for="psw">Password: </label>
                            <input id="password" type="password" name="password" placeholder="Enter Password" required>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            
                            <div class="button-container">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                @if (Route::has('register'))
                                    <button type="button"><a href="{{ route('register') }}">{{ __('Register') }}</a></button>
                                @endif
                            </div>
                        </form>
                    </div>

                    <div class="login-desk">
                        <img src="images/desktop-login.svg" width="300px" alt="desktop">
                    </div>

                </div>
            </div>

    </div>

    <script>
            const menu = document.querySelector('.menu')
            const close = document.querySelector('.close')
            const nav = document.querySelector('nav')

            menu.addEventListener('click', () => {
                nav.classList.add('open-nav')
            })

            close.addEventListener('click', () => {
                nav.classList.remove('open-nav')
            })
    </script>
    
    
</body>
</html>