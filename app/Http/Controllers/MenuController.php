<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\User;
// use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //membatasi akses menu yang bisa dibuka oleh user
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // echo "INDEX OF MENUCONTROLLER";
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
        // dd( $menus );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $users = User::all();
        return view('menus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // dd($imageName);

        $menu = new Menu();
        if ($request->hasfile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
            $menu->title = $request->title;
            $menu->description = $request->description;
            $menu->type = $request->type;
            $menu->status = $request->status;
            $menu->image = 'images/' . $imageName;
            $menu->user_id = Auth()->User()->id;
            $menu->save();
        } else{
            $menu->title = $request->title;
            $menu->title = $request->title;
            $menu->description = $request->description;
            $menu->type = $request->type;
            $menu->status = $request->status;
            $menu->image = 'images/default.jpg';
            $menu->user_id = Auth()->User()->id;
            $menu->save();
        }

        // $menu->save();
        return redirect('/menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $menus = Menu::findOrFail($id);
        // dd($menu);
        return view('menus.edit', compact('menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $menu = Menu::find($id);
        // var_dump($request->type);
        // die;
        // if ($request->hasfile('image')) {
        if ($request->hasfile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
            $menu->title = $request->title;
            $menu->description = $request->description;
            $menu->type = $request->type;
            $menu->status = $request->status;
            $menu->image = 'images/' . $imageName;
            $menu->user_id = Auth()->User()->id;
            $menu->save();
        } else {
            $menu->title = $request->title;
            $menu->title = $request->title;
            $menu->description = $request->description;
            $menu->type = $request->type;
            $menu->status = $request->status;
            // $menu->image = 'images/default.jpg';
            $menu->user_id = Auth()->User()->id;
            $menu->save();
        }
        //return view('committee')->with('success', 'Member Updated successfully');
        // return redirect()->route('members.committee')->with('success', 'Member Updated successfully');
        return redirect()->route('menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        // $menu = Menu::findOrfail($id);
        $menu = Menu::findOrFail($id)->delete();
        return redirect()->back();
        // return  $menu ;
    }
}
