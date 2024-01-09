<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Menu;
use App\Models\User;
// use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Session;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //membatasi akses item yang bisa dibuka oleh user
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // echo "INDEX OF itemCONTROLLER";
        $items = Item::all();
        // $user = User::find(1);
        // dd($items->menu->title);
        // $items = Item::find(1);
        // var_dump($items);
        // var_dump( $items->menu);
        // dd($items);
        return view('items.index', compact('items'));
        // dd( $items );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        return view('items.create',compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // dd($request->menu);
// exit;
        $item = new Item();
        if ($request->hasfile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
            $item->title = $request->title;
            $item->description = $request->description;
            $item->status = $request->status;
            $item->image = 'images/' . $imageName;
            $item->price = $request->price;
            $item->menu_id= $request->menu;
            $item->user_id = Auth()->User()->id;
            $item->save();
        } else{
            $item->title = $request->title;
            $item->description = $request->description;
            $item->status = $request->status;
            $item->menu_id = $request->menu;
            $item->price = $request->price;
            $item->image = 'images/default.jpg';
            $item->user_id = Auth()->User()->id;
            $item->save();
        }

        // $item->save();
        return redirect('/item');
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
        $items = Item::findOrFail($id);
        $menus = Menu::all();
        // dd( $items->menu->title);
        // dd($item);
        return view('items.edit', compact('items','menus'));
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
        $item = item::find($id);
        // var_dump($request->type);
        // die;
        // if ($request->hasfile('image')) {
        if ($request->hasfile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
            $item->title = $request->title;
            $item->description = $request->description;
            $item->status = $request->status;
            $item->image = 'images/' . $imageName;
            $item->price = $request->price;
            $item->menu_id = $request->menu;
            $item->user_id = Auth()->User()->id;
            $item->save();
        } else {
            $item->title = $request->title;
            $item->description = $request->description;
            $item->status = $request->status;
            $item->menu_id = $request->menu;
            $item->price = $request->price;
            // $item->image = 'images/default.jpg';
            $item->user_id = Auth()->User()->id;
            $item->save();
        }
        //return view('committee')->with('success', 'Member Updated successfully');
        // return redirect()->route('members.committee')->with('success', 'Member Updated successfully');
        return redirect()->route('item');
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
        // $item = item::findOrfail($id);
        $item = Item::findOrFail($id)->delete();
        return redirect()->back();
        // return  $item ;
    }
}
