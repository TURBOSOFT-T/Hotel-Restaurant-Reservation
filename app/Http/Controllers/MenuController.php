<?php
<<<<<<< HEAD

=======
>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa
namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function index()
    {
        //
    }

    /**
=======
    public function index(Request $request)
    {
        $user = Auth::user(); // Obtenir l'utilisateur connecté
        $menus = Menu::when($request->has("libelle"), function ($q) use ($request) {
            return $q->where("libelle", "like", "%" . $request->get("libelle") . "%");
        })
            ->when($request->has("description"), function ($q) use ($request) {
                return $q->where("description", "like", "%" . $request->get("description") . "%");
            })
            ->paginate(2);

        return view('menus.list', ['menus' => $menus, 'user' => $user]);
    }


     /**
>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
        //
    }

=======
        return view('menus.create');
    }
    
>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
=======
   
   
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'libelle' => "required",
            'description' => "required",
            'prix' => "required",
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);

        $file_name = time() . '.' . request()->image->getClientOriginalExtension();

        request()->image->move(public_path('images'), $file_name);

        //  save image and name in database
        $menu = new Menu();
        $menu->libelle = $request->libelle;
        $menu->description = $request->description;
        $menu->prix = $request->prix;
        $menu->image = $file_name;
        
        $menu->user()->associate(Auth::user());
        $menu->save();
        return redirect()->route("menus.index")
            ->with('success', 'You have successfully created the menu.');
    }








    public function destroy($id)
{
    $menu = Menu::find($id);

    if (!$menu) {
        return redirect()->route("menus.index")
            ->with('error', 'Menu not found.');
    }

    // Vérifiez si l'utilisateur connecté est le propriétaire du menu
    if($menu->user->id !== Auth::user()->id) {
        return redirect()->route("menus.index")
            ->with('error', 'You are not authorized to delete this menu.');
    }

    $menu->delete();

    return redirect()->route("menus.index")
        ->with('success', 'You have successfully deleted the menu.');
}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        
        $menu = Menu::find($id);

        if (!$menu) {
            return redirect()->route("menus.index")
                ->with('error', 'Menu not found.');
        }

        // Vérifiez si l'utilisateur connecté est le propriétaire du menu
        if($menu->user->id !== Auth::user()->id) {
            return redirect()->route("menus.index")
                ->with('error', 'You are not authorized to edit this menu.');
        }

        return view('menus.update', ["menu" => $menu]);
>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
<<<<<<< HEAD
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
=======
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'libelle' => "required",
        'description' => "required",
        'prix' => "required",
        'image' =>'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withInput()->withErrors($validator->errors());
    }

    $menu = Menu::find($id);

    if (!$menu) {
        return redirect()->route("menus.index")
            ->with('error', 'Menu not found.');
    }

    // Vérifiez si l'utilisateur connecté est le propriétaire du menu
    if($menu->user->id !== Auth::user()->id) {
        return redirect()->route("menus.index")
            ->with('error', 'You are not authorized to update this menu.');
    }

    $image = $request->hidden_image;

    if($request->image != '')
    {
        $image = time() . '.' . request()->image->getClientOriginalExtension();

        request()->image->move(public_path('images'), $image);
    }

    //  save image and name in database
    $menu->libelle = $request->libelle;
    $menu->description = $request->description;
    $menu->prix = $request->prix;
    $menu->image = $image;

    $menu->save();

    return redirect()->route("menus.index")
        ->with('success', 'You have successfully updated the menu.');
}
}



>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa
