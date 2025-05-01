<?php

namespace App\Http\Controllers\Apps;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get categories
        $categories = Category::when(request()->q, function ($categories) {
            $categories = $categories->where('NAME', 'like', '%' . request()->q . '%');
        })->latest()->paginate(5);

        //return inertia
        return Inertia::render('Apps/Categories/Index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Apps/Categories/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * validate
         */
        $request->validate([
            'IMAGE'         => 'required|image|mimes:jpeg,jpg,png|max:2000',
            'NAME'          => 'required|unique:categories',
            'DESCRIPTION'   => 'required'
        ]);

        //upload image
        $image = $request->file('IMAGE');
        $image->storeAs('public/categories', $image->hashName());

        //create category
        Category::create([
            'IMAGE'         => $image->hashName(),
            'NAME'          => $request->NAME,
            'DESCRIPTION'   => $request->DESCRIPTION
        ]);

        //redirect
        return redirect()->route('apps.categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return Inertia::render('Apps/Categories/Edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        /**
         * validate
         */
        $request->validate([
            'NAME'          => 'required|unique:categories,name,' . $category->id,
            'DESCRIPTION'   => 'required'
        ]);

        //check image update
        if ($request->file('IMAGE')) {

            //remove old image
            Storage::disk('local')->delete('public/categories/' . basename($category->IMAGE));

            //upload new image
            $image = $request->file('IMAGE');
            $image->storeAs('public/categories', $image->hashName());

            //update category with new image
            $category->update([
                'IMAGE' => $image->hashName(),
                'NAME' => $request->NAME,
                'DESCRIPTION'   => $request->DESCRIPTION
            ]);
        }

        //update category without image
        $category->update([
            'NAME'          => $request->NAME,
            'DESCRIPTION'   => $request->DESCRIPTION
        ]);

        //redirect
        return redirect()->route('apps.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find by ID
        $category = Category::findOrFail($id);

        //remove image
        Storage::disk('local')->delete('public/categories/' . basename($category->IMAGE));

        //delete
        $category->delete();

        //redirect
        return redirect()->route('apps.categories.index');
    }
}
