<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'excerpt' => ['required', 'string'],
            'category' => ['required', 'integer'],
            'tags' => ['required', 'array'],
            'thumbnail' => ['required', 'image'],
        ]);

        $article = Article::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'description' => $request->description,
            'excerpt' => $request->excerpt,
            'category_id' => $request->category,
            'thumbnail' => $this->uploadImage($request, 'thumbnail', 'uploads/articles' ),
            'user_id'   => Auth::user()->id
        ]);

        $article->tags()->attach($request->tags);

        return redirect()->back()->with('success', 'Article submitted successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
