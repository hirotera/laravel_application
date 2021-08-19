<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest; 
use App\Post;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function index()
    {
        // モデルから投稿を全件取得して表示する
        $posts = Post::all();

        // 取得したデータをビューに変数として渡す
        return view('posts.index', ['posts' => $posts]);
    }

    // 登録（投稿）画面表示
    public function create()
    {
        // create.blade.phpを表示する(これから作成)
        return view('posts.create');
    }

    // 登録（投稿）処理 Request → PostRequestに変更
    // 登録処理の前にフォームリクエストによるバリデーションが行われ、条件を満たさないデータは登録できないようにする。
    public function store(PostRequest $request)
    {
        // Postモデルのインスタンスを生成
        $post = new Post;

        // ユーザーが入力したリクエストの情報を格納していく
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = Auth::id(); // Auth::id()でログインユーザーのIDが取得できる

        $post->save(); // インスタンスをDBのレコードとして保存

        // 投稿一覧画面にリダイレクトさせる
        return redirect()->route('post.index');
    }

    public function show($id)
    {
        // 投稿データのIDでモデルから投稿を1件取得
        $post = Post::findOrFail($id);

        // show.blade.phpを表示する(これから作成)
        return view('posts.show', ['post' => $post]);
    }
}
