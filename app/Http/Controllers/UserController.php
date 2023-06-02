<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bakugan;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = auth()->user();
        return view('user/profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    { 
        $user = auth()->user();
        return view('user/edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = auth()->user();
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->username = $request->username;
        $user->image = $request->image;
        $user->save();

        return view('user/profile', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    

    public function collection()
    {
        $user = auth()->user();
        $bakugans = [];
        $userBakugans = $user->bakugans;
        $bakugansPaginate = User::find($user->id)->bakugans()->paginate(6);
        $series = json_decode(file_get_contents("http://127.0.0.1:8080/api/series"));

        foreach($bakugansPaginate as $bp){
            $fetchBakugan = json_decode(file_get_contents("http://127.0.0.1:8080/api/bakugans/" . $bp->id));
            $bakugans[] = $fetchBakugan;
        }

       return view('user/collection', compact('user','bakugansPaginate','bakugans','series'));
    }



    public function attachBakugan(Request $request)
    {

        $user = auth()->user();
        $id = $request['id'];
        $bakugan = json_decode(file_get_contents("http://127.0.0.1:8080/api/bakugans/" . $id));

        if ($user->bakugans == NULL || !$user->bakugans->contains($bakugan->bakugan->id)) {
            $user->bakugans()->attach($bakugan->bakugan->id);
            return redirect()->back()->with('success', 'Bakugan added to your collection succesfully');
        } else {
            return redirect()->back()->with('error', 'You already have this bakugan in your collection!');
        }
    }

    public function detachBakugan(Request $request)
    {

        $user = auth()->user();
        $id = $request['id'];

        $user->bakugans()->detach($id);
        return redirect()->back()->with('success', 'Bakugan remove from your collection succesfully');
       
    }
}
