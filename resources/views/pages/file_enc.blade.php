<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File | Multiple Encryption</title>
    <link rel="stylesheet" href="{{config('APP_URL').css/file.css}}">
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
                        <li><a href="/home/">Home</a></li>
                        <li><a href="/about/">About Us</a></li>
                        <li><a href="/contact/">Contact</a></li>
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
        
            <div class="input-container">
                <div class="input">
                    <form action="{{ url('/file_enc_upload/') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <label for="pwd1">Insert Password for the File:</label><br>
                    <input type="password" id="pwd1" name="pwd1" required>
                    <p class="select-label">Select files: <label for="myfile" class="upload-design"><input type="file" id="myfile" name="myfile"  required>Choose File</label>
                    </p>
                    <button type="submit" name="form1" id="form1">Post</button>
                    </form>
                </div>
            </div>

            <div class="output-container">
                <div class="table-wrapper">
                    <table class="table-align">
                        <tr>
                            <th width="25%">File Name</th>
                            <th width="25%">Owner</th>
                            <th width="25%">Date</th>
                            <th width="25%"> </th>
                        </tr>


                        <!-- Example Data-->
                        @if(count($info)>=1)
                            @foreach($info as $inf)
                                <tr>
                                    <td width="25%">{{$inf->fileName}}</td>
                                    <td width="25%">{{$inf->ownedBy}}</td>
                                    <td width="25%">{{$inf->created_at}}</td>
                                    <td width="25%"><button id="myBtn{{$inf->id}}" name="btnName{{$inf->id}}">Decrypt</button></td>

                                        <div id="myModal{{$inf->id}}" class="modal">
                                    

                                            <!-- Modal content -->
                                            <div class="modal-content">
                                            <form action="{{ url('/file_enc_enter/' .$inf->id) }}" method="post">
                                            {!! csrf_field() !!}
                                            @method("PATCH")
                                            <label for="pwd">Enter Password to access file:</label><br>
                                            <input type="password" id="pwd{{$inf->id}}" name="pwd{{$inf->id}}" required>
                                            <div class="modal_submit">
                                                <button type="submit" name="sub{{$inf->id}}">Enter</button>
                                            </form>
                                                <span class="Modal_Close{{$inf->id}}"><button type="#">Close</button></span>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    
                                    
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td width="25%">No data</td>
                                <td width="25%">No data</td>
                                <td width="25%">No data</td>
                                <td width="25%"><button disabled id="myBtn">Decrypt</button></td>

                                <div id="myModal" class="modal">

                                        <!-- Modal content -->
                                        <div class="modal-content">
                                        <label for="pwd2">Enter Password to access file:</label><br>
                                        <input type="password" id="pwd2" name="pwd2" required>
                                        <div class="modal_submit">
                                            <button type="submit" id="pwd223" name="pwd223">Enter</button>
                                            <span class="Modal_Close"><button type="#">Close</button></span>
                                            </div>
                                        </div>
                                    
                                </div>
                            </tr>
                        @endif
                        

                        </div>
                    </table>
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

@if(count($info)>=1)
    @foreach($info as $inf)
        <script>
            // Get the modal
            var modal{{$inf->id}} = document.getElementById("myModal{{$inf->id}}");
            
            // Get the button that opens the modal
            var _{{$inf->id}}  = document.getElementById("myBtn{{$inf->id}}");
            
            // Get the <span> element that closes the modal
            var span{{$inf->id}} = document.getElementsByClassName("Modal_Close{{$inf->id}}")[0];
            
            // When the user clicks the button, open the modal 
            _{{$inf->id}}.onclick = function() {
            modal{{$inf->id}}.style.display = "block";
            }
            
            // When the user clicks on <span> (x), close the modal
            span{{$inf->id}}.onclick = function() {
            modal{{$inf->id}}.style.display = "none";
            }
            
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
            if (event.target == modal{{$inf->id}}) {
                modal{{$inf->id}}.style.display = "none";
            }
            }
        </script>

    @endforeach
 @endif
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>
</body>
</html>

