<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('articles.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Crea categoria";
        $btnText = "Crea";
        $route = route('categories.store');
        $value = old('name');
        $type = "create";

        return view('articles.categories.create-edit', compact('title', 'btnText', 'route', 'value', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => 'required|max:40',
        ], [
            'name.required' => 'Il campo titolo è obbligatorio.',
            'name.max' => 'Il campo titolo può contenere massimo 40 caratteri.',
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        
        } else {

            Category::create([
                'name' => $request->name,
            ]);

        }

        return redirect()->route('categories.index')->with(['success' => 'Categoria creata con successo']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $title = "Modifica categoria";
        $btnText = "Modifica";
        $route = route('categories.update', $category);
        $value = old('name', $category->name);
        $type = "edit";

        return view('articles.categories.create-edit', compact('category', 'title', 'btnText', 'route', 'value', 'type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->name = $request->name;

        $category->save();

        return redirect()->route('categories.index')->with(['success' => 'Categoria modificata con successo']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->articles->count()) {
            return redirect()->back()->with(['error' => 'Non puoi cancellare questa categoria']);
        }

        $category->articless()->detach();

        $category->delete();

        return redirect()->route('categories.index')->with(['danger' => 'Categoria eliminata con successo']);
    }
}
