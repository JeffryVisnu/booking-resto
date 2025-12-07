<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $categoryFilter = $request->category;
        $sort = $request->sort;

        $menus = Menu::query();
        $categories = Category::all();

        if ($categoryFilter) {
            $menus->where('category_id', $categoryFilter);
        }

        if ($sort == 'price_asc') {
            $menus->orderBy('price', 'asc');
        } elseif ($sort == 'price_desc') {
            $menus->orderBy('price', 'desc');
        }

        $menus = $menus->get();

        // Group by category if no filter used
        $groupedMenus = Menu::with('category')
            ->get()
            ->groupBy(fn ($m) => $m->category->name);

        return view('menus.index', compact(
            'menus',
            'categories',
            'categoryFilter',
            'sort',
            'groupedMenus'
        ));
    }

}
