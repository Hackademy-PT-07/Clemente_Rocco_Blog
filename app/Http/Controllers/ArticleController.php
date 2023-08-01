<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Models\Category;

class ArticleController extends Controller
{
    private $articles;

    public function __construct()
    {
        /*   
        $this->articles = [
            1 => ['title' => 'Articolo 1', 'category' => 'Motori', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam numquam aliquid expedita suscipit, rem ratione sed distinctio tenetur reprehenderit amet quaerat aperiam velit accusamus eius eum magni voluptas optio iure!'],
            2 => ['title' => 'Articolo 2', 'category' => 'Sport', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam numquam aliquid expedita suscipit, rem ratione sed distinctio tenetur reprehenderit amet quaerat aperiam velit accusamus eius eum magni voluptas optio iure!'],
            3 => ['title' => 'Articolo 3', 'category' => 'Cinema', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam numquam aliquid expedita suscipit, rem ratione sed distinctio tenetur reprehenderit amet quaerat aperiam velit accusamus eius eum magni voluptas optio iure!'],
            4 => ['title' => 'Articolo 4', 'category' => 'Tecnologia', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam numquam aliquid expedita suscipit, rem ratione sed distinctio tenetur reprehenderit amet quaerat aperiam velit accusamus eius eum magni voluptas optio iure!'],
            5 => ['title' => 'Articolo 5', 'category' => 'Cucina', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam numquam aliquid expedita suscipit, rem ratione sed distinctio tenetur reprehenderit amet quaerat aperiam velit accusamus eius eum magni voluptas optio iure!'],        
        ]; 
        
        */

    }

    public function articles () {
        
    $title = "Articoli";

    $articles = Article::all();

    return view('articles.articles', compact('title', 'articles'));

    }

    public function article ($id) {

    /*     

    if(! array_key_exists($id, $this->articles)) {
        abort(404);
    } 
    
    */

    //dd($this->articles);

    $article = Article::findOrFail($id);

    // return view('articles.article.article', ['article' => $this->articles[$id]]);

    return view('articles.article.article', compact('article'));

    }

    public function index(Article $article)
    {
        // $articles = Article::paginate(5);
        // {{ $articles->links() }}

        // $articles = Article::where('user_id', auth()->user()->id)->get();

        $articles = auth()->user()->articles;

        return view('articles.index',  compact('articles'));
    }

    public function create() {

        $title = 'Crea Articolo';
        $categories = Category::orderBy('name', 'ASC')->get();
        // si puo' usare anche questo direttamente nella view
        // @foreach(App\Models\Category::all() as $category)

        return view('articles.create', compact('title', 'categories'));

    }

    public function store(StoreArticleRequest $request) {

        $article = Article::create(array_merge(
            $request->all(), 
            ['user_id' => auth()->user()->id]
        ));

        $article->categories()->attach($request->categories);

        /*         
        $article = Article::create([
            'title' => $request->title,
        ]); 
        */

        if ($request->hasFile('image') && $request->file('image')->isValid())
        {

            //$fileName = $request->file('image')->getClientOriginalName();
            //$extension = $request->file('image')->extension();

            $randomFileName = uniqid('image_'). "." . $request->file('image')->extension();
            $imagePath = $request->file('image')->storeAs('public/images' .$article->id , $randomFileName);
            
            //$urlSafeFileName = \Illuminate\Support\Str::slug($fileName) . ".$extension"; 
            
            $article->image = $imagePath;

            $article->save();

        }

        return redirect()->route('articlesList')->with(['success' => 'Articolo creato con successo']);
    
    }

    public function edit(Article $article)
    {

        if($article->user_id != auth()->user()->id) {
            abort(403);
        };

        $categories = Category::all();

        return view('articles.edit',  compact('categories', 'article'));
    
    }

    public function update(Request $request, Article $article)
    {
        if($article->user_id != auth()->user()->id) {
            abort(403);
        };

        // $article->update($request->all());

        /* 
        $article->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' => $request->image,
            'body' => $request->body,
        ]); 
        */

        $article->fill($request->all())->save();

        $article->categories()->detach();
        $article->categories()->attach($request->categories);

        return redirect()->route('articlesList')->with(['success' => 'Articolo modificato con successo']);
    }

    public function destroy(Article $article)
    {
        if($article->user_id != auth()->user()->id) {
            abort(403);
        };

        $article->categories()->detach();

        $article->delete();

        return redirect()->route('articlesList')->with(['danger' => 'Articolo eliminato con successo']);
    }
    
}