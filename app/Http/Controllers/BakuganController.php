<?php

namespace App\Http\Controllers;

use App\Models\Bakugan;
use Illuminate\Http\Request;

class BakuganController extends Controller
{

    public function index()
    {
       
        $bakugans = [];
        $bakugansPaginate = Bakugan::paginate(6);

        foreach($bakugansPaginate as $bp){
            $fetchBakugan = json_decode(file_get_contents("http://127.0.0.1:8080/api/bakugans/" . $bp->id));
            $bakugans[] = $fetchBakugan;
        }

        $series = json_decode(file_get_contents("http://127.0.0.1:8080/api/series"));
        return view('bakugan/list', compact('bakugansPaginate','bakugans','series'));
    }


    public function addToDatabase()
    {
        $bakugans = json_decode(file_get_contents("http://127.0.0.1:8080/api/bakugans"));

        foreach ($bakugans as $bakugan) {
            Bakugan::create([
                'id' => $bakugan->id
            ]);
        }
    }

    public function attach(Request $request)
    {
        $user = auth()->user();
        $id = $request['id'];
        $bakugan = json_decode(file_get_contents("http://127.0.0.1:8080/api/bakugans/" . $id));

       
       $bakugan->users()->attach(auth()->user->id);
       return view('bakugan/list', compact('Bakugan added to collection succesfully'));
    }

   

   



   
}
