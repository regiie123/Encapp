<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Share;
use App\Models\Enc;
use App\Models\Checking;
use DB;
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
}
