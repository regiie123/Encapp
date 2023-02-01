<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text Censor | Multiple Encryption</title>
    <link rel="stylesheet" href="css/file.css">
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
                <a href="index.html" class="logo">Multiple Encryption</a>
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
                        <li><a href="/home">Home</a></li>
                        <li><a href="/about">About Us</a></li>
                        <li><a href="/contact">Contact</a></li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
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

    <div class="post-container">
        <div class="undo">
                <a href="/home" ><svg class="back" xmlns="http://www.w3.org/2000/svg" width="0.8em" height="0.8em" 
                    preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="white" 
                    d="M19 11H7.83l4.88-4.88c.39-.39.39-1.03 0-1.42a.996.996 0 0 0-1.41 0l-6.59 
                    6.59a.996.996 0 0 0 0 1.41l6.59 6.59a.996.996 0 1 0 1.41-1.41L7.83 13H19c.55 0 
                    1-.45 1-1s-.45-1-1-1z"/> 
                </svg> Back</a>
                
        </div>

        <div class=input-container>
            <div class=input>
                <div class=form-group>
                    <form action="{{ url('/share_txt_upload/') }}" method="post">
                    @csrf
                    @method('POST')
                    <p>Censor Text:</p>
                    <label for=foo>Enter Text to Censor</label><br>
                    <textarea class=form-control name=foo id=text-censor rows="5" cols="50" onchange="GFG_Fun()"></textarea>
                </div>
                    <button type=submit id=censor Text>Submit</button>
                    </form> 
            </div>
        </div>

        <div class="output-container">
            <div class="table-wrapper">
                <table class="table-align">
                    <tr>
                        <th width="33%">Shared Text</th>
                        <th width="33%">Owner</th>
                        <th width="33%">Date</th>
                    </tr>


                    <!-- Example Data-->
                    @if(count($info)>=1)
                        @foreach($info as $inf)
                            <tr>
                                <td ><div class="cstring">{{$inf->Cstring}}</div></td>
                                <td >{{$inf->Owner}}</td>
                                <td >{{$inf->created_at}}</td>
              
                                
                            </tr>

                        @endforeach
                    @else
                        <tr>
                            <td width="33%">No data</td>
                            <td width="33%">No data</td>
                            <td width="3%">No data</td>

                            
                        </tr>
                    @endif
                    

                    </div>
                </table>
            </div>
        </div>
    </div>
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>

<script>
        function GFG_Fun() {
            const textarea = document.getElementById('text-censor');
            let badwords = /a55|ass|bitch|b!tch|b1tch|damn|fuck|f u c k|fucked|fucker|goddamn|piece of shit|mothafucker|motherfucker|mother fucker|n1gga|nigga|porn|porno|pornography|sh1t|shit|amputa|animal ka|bobo|demonyo ka|gaga|gagi|gago|hayop ka|hayup|hinayupak|kagaguhan|kaululan|kingina|kupal|leche|nimal|ogag|pakshet|pakyu|pesteng yawa|pukinangina|puta|putang ina|putangina|putanginamo|putragis|taena|tanga|tangina|ulol|ulul/gi;
            let censor1 = textarea.value;
            let censor2 = censor1.replace(badwords,'*****');
            document.getElementById('text-censor').value = censor2;;
        }
</script>
</body>
</html>