<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::whereIn('id', [1, 2, 3])->with(['articles' => function ($query) {
            $query->where('status', 'published')->orderBy('id', 'desc');
        }])->get();
        $editorsPick = Article::whereIn('id', [4,6,9,16,19,23,24])->where('status', 'published')->with(['category', 'user'])->orderBy('id', 'desc')->get();
        return view('welcome', compact('categories', 'editorsPick'));
    }

    public function show(Request $request){
        $article = Article::where('slug', $request->slug)->whereStatus('published')
        ->whereHas('category', function ($query) use ($request) {
            $query->where('slug', $request->category);
        })
        ->with(['category', 'user', 'comments'])
        ->first();

        
        if($article){
            return view('single', compact('article'));
        }else{
            return redirect()->route('404');
        }
    }

    public function categoryPosts(Request $request){
        $category = Category::where('slug', $request->slug)->first();

        if($category){
            $articles = $category->articlesPublished()->with(['user', 'category'])->orderBy('id', 'desc')->paginate(10);
            return view('category', compact('articles', 'category'));
        }else{
            return redirect()->route('404');
        }
    }

    public function tagPosts(Request $request){
        $tag = Tag::where('slug', $request->slug)->first();

        if($tag){
            $articles = $tag->articlesPublished()->with(['user', 'category'])->orderBy('id', 'desc')->paginate(10);
            return view('tag', compact('articles', 'tag'));
        }else{
            return redirect()->route('404');
        }
    }

    public function authorPosts(Request $request){
        $user = User::where('username', $request->username)->with('comments')->first();

        if($user){
            $articles = $user->articlesPublished()->with(['user', 'category'])->orderBy('id', 'desc')->paginate(10);
            return view('author', compact('articles', 'user'));
        }else{
            return redirect()->route('404');
        }
    }

    public function search(Request $request){

        $term = $request->input('q');

        $articles = Article::where('title', 'like', '%' . $term . '%')
            ->orWhere('description', 'like', '%' . $term . '%')
            ->whereStatus('published')->orderBy('id', 'desc')->paginate(9);
        
            return view('search', compact('articles', 'term'));
    }

    public function articles(){
        $articles = Article::whereStatus('published')->orderBy('id', 'desc')->paginate(9);
        return view('articles', compact('articles'));
    }
}
