<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.menus.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // // {
    // //     $image = $request->file('image')->store('public/menus');
    //     //         $request->validate([

    //     //     'name' =>  'required',
    //     //     'description' =>  'required',
    //     //     'image'=>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
    //     //     'price' =>  'required'
    //     // ]);
    //     $request->validate([

    //         'name'          =>  'required',
    //         'description'    =>  'required',
    //         'image'         =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
    //     ]);


    //     $file_name = time() . '.' . request()->image->getClientOriginalExtension();

    //     request()->image->move(public_path('images'), $file_name);
    //     // if ($request->has('categories')) {
    //     //     $menu->categories()->attach($request->categories);
    //     // }
    //     $menu = new Category;

    //     $menu->name = $request->name;
    //     $menu->description = $request->description;

    //     $menu->image = $file_name;

    //     $menu->save();

    //     if ($request->has('categories')) {
    //         $menu->categories()->attach($request->categories);
    //         }
    //     return to_route('admin.menus.index')->with('success', 'Menu created successfully.');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>  'required',
                'description' =>  'required',
                'image'=>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
                  'price' =>  'required'
        ]);

        $file_name = time() . '.' . request()->image->getClientOriginalExtension();

        request()->image->move(public_path('images'), $file_name);



    $menu = new Menu;

       $menu->name = $request->name;
      $menu->description = $request->description;

        $menu->image = $file_name;
        $menu->price = $request->price;

       $menu->save();

        if ($request->has('categories')) {
            $menu->categories()->attach($request->categories);
            }
        return to_route('admin.menus.index')->with('success', 'Menu created successfully.');




    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $categories = Category::all();
        return view('admin.menus.edit', compact('menu', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',

        ]);
        $image = $menu->image;
        if ($request->hasFile('image')) {
            Storage::delete($menu->image);
            $image = $request->file('image')->store('public/menus');
        }

        $menu->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price
        ]);

        if ($request->has('categories')) {
            $menu->categories()->sync($request->categories);
        }
        return to_route('admin.menus.index')->with('success', 'Menu updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        Storage::delete($menu->image);
        $menu->categories()->detach();
        $menu->delete();
        return to_route('admin.menus.index')->with('danger', 'Menu deleted successfully.');
    }
}
