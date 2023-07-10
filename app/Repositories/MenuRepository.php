<?php

namespace App\Repositories;
use App\Models\Menu;

class MenuRepository
{
    protected function queryActive()
    {
        return Menu::select(
                      'id',
                      'slug',
                      'image',
                      'title',

                      'user_id')
                    ->with('user:id,name')
                    ->whereActive(true);
    }

    protected function queryActiveOrderByDate()
    {
        return $this->queryActive()->latest();
    }

    public function getActiveOrderByDate($nbrPages)
    {
        return $this->queryActiveOrderByDate()->paginate($nbrPages);
    }

     public function getHeros()
    {
        return $this->queryActive()->with('categories')->latest('updated_at')->take(10)->get();
    }

    public function getMenuBySlug($slug)
{
    // Menu for slug with user and categories
    $menu = Menu::with(
                'user:id,name,email',

                'categories:title,slug'
            )
            ->withCount('validComments')
            ->whereSlug($slug)
            ->firstOrFail();

    // Previous
    $menu->previous = $this->getPreviousMenu($menu->id);

    // Next
    $menu->next = $this->getNextMenu($menu->id);

    return $menu;
}

protected function getPreviousMenu($id)
{
    return Menu::select('title', 'slug')
                ->whereActive(true)
                ->latest('id')
                ->firstWhere('id', '<', $id);
}

protected function getNextMenu($id)
{
    return Menu::select('title', 'slug')
                ->whereActive(true)
                ->oldest('id')
                ->firstWhere('id', '>', $id);
}


    /**
     * Get active menus for specified category.
     *
     * @param  int  $nbrPages
     * @param  string  $category_slug
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getActiveOrderByDateForCategory($nbrPages, $category_slug)
    {
        return $this->queryActiveOrderByDate()
                    ->whereHas('categories', function ($q) use ($category_slug) {
                        $q->where('categories.slug', $category_slug);
                    })->paginate($nbrPages);
    }

    /**
     * Get active menus for specified user.
     *
     * @param  int  $nbrPages
     * @param  integer  $user_id
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getActiveOrderByDateForUser($nbrPages, $user_id)
    {
        return $this->queryActiveOrderByDate()
                    ->whereHas('user', function ($q) use ($user_id) {
                        $q->where('users.id', $user_id);
                    })->paginate($nbrPages);
    }


    /**
     * Get menus with search.
     *
     * @param  int  $n
     * @param  string  $search
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function search($n, $search)
    {
        return $this->queryActiveOrderByDate()
                    ->where(function ($q) use ($search) {
                        $q->where('body', 'like', "%$search%")

                          ->orWhere('title', 'like', "%$search%");
                    })->paginate($n);
    }
}