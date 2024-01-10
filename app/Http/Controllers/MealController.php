<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\User;
// use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Session;

class MealController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //membatasi akses Meal yang bisa dibuka oleh user
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // echo "INDEX OF MealCONTROLLER";
        // $meals = Meal::all();
        $meals = Meal::paginate(2);
        // $menus = \App\Models\Menu::pluck('title');
        return view('meals.index', compact('meals'));
        // dd( $meals );,'menus'
    }

    // function to get all items
    public function GetAllMenu(){
        $menus = \App\Models\Menu::plunk('title');
        return view('meals.index', compact('menus'));
    }
    public function getItem($id)
    {
        $items = \App\Models\Item::where("menu_id", $id)->pluck("title", "id");
        return json_encode($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $users = User::all();
        $menus = \App\Models\Menu::all();
        return view('meals.create', compact('menus'));
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

        $Meal = new Meal();
        if ($request->hasfile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
            $Meal->title = $request->title;
            $Meal->description = $request->description;
            $Meal->type = $request->type;
            $Meal->status = $request->status;
            $Meal->image = 'images/' . $imageName;
            $Meal->user_id = Auth()->User()->id;
            $Meal->save();
        } else{
            $Meal->title = $request->title;
            $Meal->title = $request->title;
            $Meal->description = $request->description;
            $Meal->type = $request->type;
            $Meal->status = $request->status;
            $Meal->image = 'images/default.jpg';
            $Meal->user_id = Auth()->User()->id;
            $Meal->save();
        }

        // $Meal->save();
        return redirect('/Meal');
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
        $meals = Meal::findOrFail($id);
        // dd($Meal);
        return view('meals.edit', compact('meals'));
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
        $Meal = Meal::find($id);
        // var_dump($request->type);
        // die;
        // if ($request->hasfile('image')) {
        if ($request->hasfile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
            $Meal->title = $request->title;
            $Meal->description = $request->description;
            $Meal->type = $request->type;
            $Meal->status = $request->status;
            $Meal->image = 'images/' . $imageName;
            $Meal->user_id = Auth()->User()->id;
            $Meal->save();
        } else {
            $Meal->title = $request->title;
            $Meal->title = $request->title;
            $Meal->description = $request->description;
            $Meal->type = $request->type;
            $Meal->status = $request->status;
            // $Meal->image = 'images/default.jpg';
            $Meal->user_id = Auth()->User()->id;
            $Meal->save();
        }
        //return view('committee')->with('success', 'Member Updated successfully');
        // return redirect()->route('members.committee')->with('success', 'Member Updated successfully');
        return redirect()->route('Meal');
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
        // $Meal = Meal::findOrfail($id);
        $Meal = Meal::findOrFail($id)->delete();
        return redirect()->back();
        // return  $Meal ;
    }
}
