<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    use ImageUploadTrait;
    
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->with('category')->paginate(10);
        return view('admin.index', compact('articles'));
    }

    public function dashboard()
    {   $articles = Article::get();
        $pendings = Article::where('status', 'pending')->with('user')->paginate(10);
        return view('admin.dashboard', compact('articles', 'pendings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        $tags = Tag::get();
        return view('admin.create',compact('categories', 'tags'));
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
            'tags' => ['array'],
            'thumbnail' => ['required', 'image'],
            'is_featured'   => ['required', 'in:yes,no'],
            'is_trending'   => ['required', 'in:yes,no'],
            'status'   => ['required', 'in:published,pending,rejected'],
        ]);

        $article = Article::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'description' => $request->description,
            'excerpt' => $request->excerpt,
            'category_id' => $request->category,
            'thumbnail' => $this->uploadImage($request, 'thumbnail', 'uploads/articles' ),
            'user_id'   => Auth::user()->id,
            'status'    => $request->status,
            'is_featured'    => $request->is_featured === 'yes' ? true : false,
            'is_trending'    => $request->is_trending === 'yes' ? true : false,
        ]);

        $article->tags()->attach($request->tags);

        return redirect()->route('admin.article.index')->with('success', 'Article submitted successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::get();
        $tags = Tag::get();
        return view('admin.edit',compact('categories', 'tags', 'article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'excerpt' => ['required', 'string'],
            'category' => ['required', 'integer'],
            'tags' => [ 'array'],
            'thumbnail' => ['image'],
            'is_featured'   => ['required', 'in:yes,no'],
            'is_trending'   => ['required', 'in:yes,no'],
            'status'   => ['required', 'in:published,pending,rejected'],
        ]);

        $article = Article::findOrFail($id);

        if (strpos($article->description, '<img') !== false) {
            preg_match_all('/<img.*?src=[\'"](.*?)[\'"].*?>/i', $article->description, $matches);
            $imageUrls = $matches[1];
            foreach ($imageUrls as $imageUrl) {
                if (!strpos($request->description, $imageUrl)) {
                    File::delete(public_path($imageUrl));
                }
            }
        }

        $article->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'description' => $request->description,
            'excerpt' => $request->excerpt,
            'category_id' => $request->category,
            'thumbnail' => $this->updateImage($request, 'thumbnail', 'uploads/articles', $article->thumbnail ),
            'user_id'   => Auth::user()->id,
            'status'    => $request->status,
            'is_featured'    => $request->is_featured === 'yes' ? true : false,
            'is_trending'    => $request->is_trending === 'yes' ? true : false,
        ]);

        if($request->tags)

        $article->tags()->sync($request->tags);

        return redirect()->back()->with('success', 'Article updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);

        if (strpos($article->description, '<img') !== false) {
            preg_match_all('/<img.*?src=[\'"](.*?)[\'"].*?>/i', $article->description, $matches);
            $imageUrls = $matches[1];
            foreach ($imageUrls as $imageUrl) {
                File::delete(public_path($imageUrl));
            }
        }

        File::delete(public_path($article->thumbnail));
        $article->delete();
        return redirect()->back()->with('success', 'Deleted Successfully.');



    }
}
