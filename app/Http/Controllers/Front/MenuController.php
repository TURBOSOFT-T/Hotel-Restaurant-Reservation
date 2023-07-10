<?php

namespace App\Http\Controllers\Front;

use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;

use App\Http\Requests\Front\SearchRequest;
use App\Repositories\MenuRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    protected $menuRepository;
    protected $nbrPages;
    public function __construct(menuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
        $this->nbrPages = config('app.nbrPages.menus');
    }
    public function index()
    {
        $menus = $this->menuRepository->getActiveOrderByDate($this->nbrPages);
        $heros = $this->menuRepository->getHeros();
        return view('front.index', compact('menus', 'heros'));

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
     * @param  \App\Http\Requests\StoreMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenuRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        $menu = $this->menuRepository->getMenuBySlug($slug);

        return view('front.menu', compact('menu'));
    }

    /**
     * Display a listing of the menus for the specified category.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function category(Category $category)
    {
        $menus = $this->menuRepository->getActiveOrderByDateForCategory($this->nbrPages, $category->slug);
        $title = __('Menus for category ') . '<strong>' . $category->title . '</strong>';

        return view('front.index', compact('menus', 'title'));
    }


    public function user(User $user)
    {
        $menus = $this->menuRepository->getActiveOrderByDateForUser($this->nbrPages, $user->id);
        $title = __('Menus for author ') . '<strong>' . $user->name . '</strong>';

        return view('front.index', compact('enums', 'title'));
    }




    public function search(SearchRequest $request)
    {
        $search = $request->search;
        $menus = $this->menuRepository->search($this->nbrPages, $search);
        $title = __('Menus found with search: ') . '<strong>' . $search . '</strong>';

        return view('front.index', compact('menus', 'title'));
    }
}