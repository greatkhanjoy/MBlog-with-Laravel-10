<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
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
            'comment'   => ['required', 'string'],
            'article_id'   => ['required', 'integer'],
            'parent_id'   => ['required', 'integer'],
        ]);

        Comment::create([
            'comment'   => $request->comment,
            'article_id'   => $request->article_id,
            'parent_id'   => $request->parent_id,
            'user_id'   => Auth::user()->id,
        ]);

        $article = Article::find($request->article_id);
        $articleOwner = $article->user_id;

        Notification::create([
            'type'   => 'comment',
            'user_id' => $articleOwner,
            'article_id' => $article->id,
            'message'   => 'There is a new comment on your Article - <a href="'.route('article.show', ['category' => $article->category->slug, 'slug' => $article->slug]).'">' . $article->title . '</a>',
            'status'    => 'unread'
        ]);

        // $articleOwner->notify(new ArticleCommentedNotification($article, $comment));

        // Create notifications for other users who have commented on the article
        $otherCommentedUsers = $article->comments()
            ->where('user_id', '!=', Auth::user()->id)
            ->pluck('user_id')
            ->unique();

        foreach ($otherCommentedUsers as $userId) {
            $user = User::find($userId);
            Notification::create([
                'type'   => 'comment',
                'user_id' => $userId,
                'article_id' => $article->id,
                'message'   => 'There is a new comment on Article - <a href="'.route('article.show', ['category' => $article->category->slug, 'slug' => $article->slug]).'">' . $article->title . '</a>',
                'status'    => 'unread'
            ]);
            // $user->notify(new ArticleCommentedNotification($article, $comment));
        }

        return redirect()->back()->with('success', 'Success!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
