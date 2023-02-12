<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Share;
use App\Models\User;
use App\Models\Enc;
use App\Models\Chat;
use App\Models\Checking;
use DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Auth;



class PagesController extends Controller
{
    public function login(){
        if (Auth::check()) {
            return redirect()->route('home');
        }
        else{
            return view('auth.login');
        }
    }

    public function register(){
        return view('pages.register');
    }

    public function start(){
        return view('pages.start');
    }

    public function banned(){

        $ban = User::where('ban', 3)->get();
        return view('pages.banned')->with('ban', $ban);
    }

    public function text_enc(){
        if (Auth::check()) {
            return view('pages.text_enc');
        }
        else{
            return redirect()->route('login');
        }
    }

    public function enc(){
        if (Checking::exists()) {
            $check = 1;
            $info = Enc::latest()->first();
            $value = $info->encString;
            Checking::truncate();

            return view('pages.enc')->with('check', $check)->with('value', $value);
        }
        $check = 0;
        return view('pages.enc')->with('check', $check);
    }

    public function dec(){
        if (Checking::exists()) {
            $check = 1;
            $info = Enc::latest('updated_at')->first();
            $value = $info->decString;
            Checking::truncate();

            return view('pages.dec')->with('check', $check)->with('value', $value);
        }
        $check = 0;
        return view('pages.dec')->with('check', $check);
    }

    public function file_enc(){

        $info = Post::all();
        return view('pages.file_enc')->with('info', $info);
    }

    public function file_enc_upload(Request $request){

        #$name = $request->file('myfile')->getClientOriginalName();
        $password = $request->input('pwd1');
        $owned = Auth::user()->name;

        $test = $request->file('myfile')->storeAs('files',$request->file('myfile')->getClientOriginalName(), 'public',);
        $newfile = new Post();
        $newfile->fileName = $test;
        $newfile->passWord = $password;
        $newfile->ownedBy = $owned;
        $newfile->save();


        return redirect()->back() ->with('alert', 'Succesfully Uploaded!');
    }


    public function file_enc_enter(Request $request, $id){

        $info = Post::find($id);
        $check = $request->input('pwd'.$id);
        $myFile = $info->fileName;


        if ($info->passWord == $check){
            if (Storage::disk('public')->exists($myFile)) {
                #$dl = Storage::get('public/'.$myFile);
                return Storage::download('public/'.$myFile);
            }
            else{
                return "There was an error";
            }
        }
        else{
            return redirect()->back() ->with('alert', 'Wrong Password!');
        }

    }


    public function text_enc_enter(Request $request){

        $string = $request->input('foo');
        $enc_string = Crypt::encryptString($string);
        $password = $request->input('pass');
        $newEntry = new Enc();
        $newEntry->encString = $enc_string;
        $newEntry->passWord = $password;
        $newEntry->save();
        $check = new Checking();
        $check->checker = '1';
        $check->save();


        #return view('pages.enc')->with('enc_string', $enc_string)->with('check', $check) ->with('alert', 'Succesfully Encrypted!');
        return redirect()->back() ->with('alert', 'Succesfully Encrypted!');
    }


    public function text_dec_enter(Request $request){
        $check = $request->input('foo');
        $password = $request->input('pass');
        if (Enc::exists()){
            $data = Enc::all();
            foreach($data as $d){
                if($d->encString == $check){
                    if($d->passWord == $password){
                        try {
                            $decrypted = Crypt::decryptString($check);
                            $d->decString = $decrypted;
                            $d->save();
                            $check = new Checking();
                            $check->checker = '1';
                            $check->save();
                            return redirect()->back() ->with('alert', 'Correct Password!');
                        } catch (DecryptException $e) {
                            return redirect()->back() ->with('alert', 'Invalid Key!');
                        }
                    }
                    else{
                        return redirect()->back() ->with('alert', 'Invalid Password!');
                    }
                }
                else{
                    continue;
                }
            }
        }
        else{
            return redirect()->back() ->with('alert', 'Nothing Encrypted yet!');
        }
    }



    public function share_txt(){

        $info = Share::all();
        #return view('pages.file_enc')->with('info', $info);
        return view('pages.share_txt')->with('info', $info);
    }


    public function share_txt_upload(Request $request){

        #$name = $request->file('myfile')->getClientOriginalName();
        $text = $request->input('foo');
        $owned = Auth::user()->name;

        $alert = 0;
        $counter = 0;

        $arr = array("puta", "gago", "bobo", "a55", "ass", "bitch", "b!tch", "b1tch", "damn", "fuck", "f u c k", "fucked", "fucker", "goddamn", "mothafucker", "motherfucker", "mother fucker", "n1gga", "nigga", "porn", "porno", "pornography", "sh1t", "shit", "amputa", "animal ka", "bobo", "demonyo ka", "gaga", "gagi", "gago", "hayop ka", "ayup", "hinayupak", "kagaguhan", "kaululan", "kingina", "kupal", "leche", "nimal", "ogag", "pakshet", "pakyu", "pesteng yawa", "pukinangina", "puta", "putang ina", "putangina", "putanginamo", "putragis", "taena", "tanga", "tangina","ulol", "ulul");

        foreach ($arr as $b) {

        $check = str_replace($b,"****", $text, $count);
        $text = $check;
        
        if ($count != 0){

            $alert = 1;
            continue;
        }
        else{
            continue;
        }
        }


        if ($alert == 0){
            $newfile = new Share();
            $newfile->Cstring = $text;
            $newfile->Owner = $owned;
            $newfile->save();

            return redirect()->back() ->with('alert', 'Succesfully Submitted!');
        }
        else{
            $newfile = new Share();
            $newfile->Cstring = $text;
            $newfile->Owner = $owned;
            $newfile->save();
            return redirect()->back() ->with('alert', 'Succesfully Submitted!');
        }

        #$newfile = new Share();
        #$newfile->Cstring = $text;
        #$newfile->Owner = $owned;
        #$newfile->save();


        #return redirect()->back() ->with('alert', 'Succesfully Submitted!');
    }

    public function about(){

        #return view('pages.file_enc')->with('info', $info);
        return view('pages.about');
    }

    public function contact(){

        #return view('pages.file_enc')->with('info', $info);
        return view('pages.contact');
    }

    public function chat(Request $request, $id){


        $to_id = $id;
        $to_id = (int)$to_id;
        $currUser = Auth::id();
        $currUser = (int)$currUser;
        $owned = Auth::user()->name;
        $owner = User::find($id);
        $owned = $owner->name;

        try{

            #$info = DB::table('chats')->get();
            #$info = DB::table('chats')->where('send_id', '$currUser')->where('rec_id', '$to_id')->orWhere(function($query){$query->where('rec_id', '$currUser')->where('send_id', '$to_id');})->get();
            $info = DB::table('chats')->where(function($query)use ($currUser, $to_id){$query->where('rec_id','=', "$currUser")->where('send_id','=', "$to_id");})->orWhere(function($query)use ($currUser, $to_id){$query->where('rec_id','=', "$currUser")->where('send_id','=', "$to_id");})->get();
            #$info = DB::table('chats')->where('send_id','=', "$currUser")->where('rec_id','=', "$to_id")->orWhere(function($query)use ($id){$query->where('rec_id','=', "$currUser")->where('send_id','=', "$to_id");})->get();
            #$info = DB::table('chats')->where('send_id','=', 1)->where('rec_id','=', 3)->orWhere(function($query){$query->where('rec_id','=', 1)->where('send_id','=', 3);})->get();
            #$info = DB::table('Chat')->where('send_id','=', 1)->where('rec_id','=', 3)->orWhere(function($query){$query->where('rec_id','=', 1)->where('send_id','=', 3);})->get()->toArray();
            #$info = Chat::where('send_id', $currUser)->where('rec_id', $to_id)->orWhere('rec_id', $currUser)->where('send_id', $to_id)->get();
            return view('pages.chat')->with('info', $info)->with('currUser', $currUser)->with('owned', $owned)->with('to_id', $to_id);
        }

        catch(Exception $e){
            return view('pages.chat');
        }


        #return view('pages.file_enc')->with('info', $info);
    }

    public function chat_retrieve(Request $request, $id){


        $to_id = $id;
        $datat= gettype($id);
        $wew = 1;
        $pass = '<div class="chat outgoing"><div class="details"><p>'.$to_id.'</p></div></div>';
        
        $currUser = Auth::id();
        $datat= gettype($currUser);
        
        
        $owned = Auth::user()->name;

        try{
            #$info = DB::table('chats')->where(function($query)use($currUser, $to_id){$query->where('rec_id','=', $currUser)->where('send_id','=', $to_id);})->orWhere(function($query)use($currUser, $to_id){$query->where('rec_id','=', $currUser)->where('send_id','=', $to_id);})->get();
            #$info = DB::table('chats')->where(function($query)use ($currUser, $to_id){$query->where('rec_id','=', "$currUser")->where('send_id','=', "$to_id");})->orWhere(function($query)use ($currUser, $to_id){$query->where('rec_id','=', "$currUser")->where('send_id','=', "$to_id");})->get();
            $info = Chat::where('send_id', $currUser)->where('rec_id', $to_id)->orWhere('rec_id', $currUser)->where('send_id', $to_id)->get();
            #$info = DB::table('chats')->where('send_id','=', '$currUser')->where('rec_id','=', '$to_id')->orWhere(function($query){$query->where('rec_id','=', '$currUser')->where('send_id','=', '$to_id');})->get();
            #$info = DB::table('chats')->where('send_id','=', 1)->where('rec_id','=', 3)->orWhere(function($query){$query->where('rec_id','=', 1)->where('send_id','=', 3);})->get()->toArray();
            #$info = DB::table('chat')->where('send_id', $currUser)->where('rec_id', $to_id)->orWhere(function($query){$query->where('rec_id', $currUser)->where('send_id', $to_id);})->get()->toArray();
            #$info = Chat::where(function($query)use($currUser, $to_id){$query->where('rec_id',$currUser)->where('send_id',$to_id);})->get();
            
            $datat= gettype($info);
            #$info = DB::table('chats')->where(fn($query) => $query->where('rec_id', '=', $currUser))->get();

            #$array = (array) $info;
            $counter = count($info);
            $output = "";
            $img = "'";
            

            for($a=0; $a<$counter; $a++){
                if($info[$a]->send_id === $currUser){
                    $output .= '<div class="chat outgoing"><div class="details"><p>'.$info[$a]->msg.'</p></div></div>';
                }
                else{
                    $output .= '<div class="chat incoming"><svg height="35" width="35" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="M8 14.5a6.47 6.47 0 0 0 3.25-.87V11.5A2.25 2.25 0 0 0 9 9.25H7a2.25 2.25 0 0 0-2.25 2.25v2.13A6.47 6.47 0 0 0 8 14.5Zm4.75-3v.937a6.5 6.5 0 1 0-9.5 0V11.5a3.752 3.752 0 0 1 2.486-3.532a3 3 0 1 1 4.528 0A3.752 3.752 0 0 1 12.75 11.5ZM8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16ZM9.5 6a1.5 1.5 0 1 1-3 0a1.5 1.5 0 0 1 3 0Z" clip-rule="evenodd"/></svg><div class="details"><p>'.$info[$a]->msg.'</p></div></div>';

                }
            }

            #foreach($info as $inf){
                #if($inf->send_id = $currUser){
                    #$output =$output. '<div class="chat outgoing"><div class="details"><p>'.$inf->msg.'</p></div></div>';
                #}
                #else{
                    #$output =$output. '<div class="chat incoming"><img src="images/profimage.png" alt=""><div class="details"><p>'.$inf->msg.'</p></div></div>';

                #}
            #}
            


            
            #echo $output;
            #$try = strval($output);

            #$arr = array('info' => $datat);
    
            #return response($info);
            #return response("hello", 200)->header('Content-Type', 'text/plain');
            #echo $output;

            #dd($info->data);

            #return response()->json(['info' => $array]);
            #return response()->json(['info' => $info]);

            return response($output);
            #return response()->json(['data' => $new,], 200);

            #return Response::json($info);
            
            #return Response::json(array('info' => $info));
            #return response()->json(json_encode($info), 200);
            #return response()->json($oResponse['body'], $oResponse['status']);
            #return response(200)->with('info', $info)->with('currUser', $currUser)->with('owned', $owned)->with('output', $output);
        }

        catch(Exception $e){
            return redirect()->back() ->with('alert', 'Failed');
        }


        #return view('pages.file_enc')->with('info', $info);
    }


    public function chat_send(Request $request, $id){

        

        $user = Auth::id();
        $useinfo = User::find($user);

        if($useinfo->ban>=3){
            $yes = 3;
            return response($yes);
        }
        elseif($useinfo->ban<3){
            $pass= $request->all();
            $message = $request->input('message');
            $recid = $request->input('incoming_id');
            if (strpos($message, '*****') !== false) {
                #$test1 = "Testing";
                $useinfo->ban = $useinfo->ban + 1;
                $passback = $useinfo->ban;
                $useinfo->save();
                #return response($passback);
                return response($passback);
            }
            else{
                $post = new Chat();
                $post->msg = $message;
                $post->send_id = $user;
                $post->rec_id = $recid;

                $post->save();

                return response($post);
            }

        }

    }

    public function choose_chat(){

        $user = User::all();
        $message = Chat::all();
        $userId = Auth::id();
        $name = Auth::user()->name;
        
        return view('pages.choosechat')->with('user', $user)->with('message', $message)->with('userId', $userId)->with('name', $name);


    }
}
