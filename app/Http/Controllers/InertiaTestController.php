<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\InertiaTest;

class InertiaTestController extends Controller
{
    public function index()
    {
        // 第2引数でデータを渡す
        return Inertia::render('Inertia/Index', [
            'blogs' => InertiaTest::all() 
        ]);
    }

    public function create()
    {
        return Inertia::render('Inertia/Create');
    }

    public function show($id)
    {
        // dd($id); //変数が渡ってきているかを確認
        return Inertia::render('Inertia/Show', 
        [
            'id' => $id,
            'blog' => InertiaTest::findOrFail($id)
        ]);
    }

    public function store(Request $request)
    {
        //バリデーション（エラーがあるなら、ビュー側にerrorオブジェクトが渡る
        $request->validate([
            'title' => ['required', 'max:20'],
            'content' => ['required'],
        ]); 
        
        $inertiaTest = new InertiaTest;
        $inertiaTest->title = $request->title; //requestからわたってくるものを入れる
        $inertiaTest->content = $request->content;
        $inertiaTest->save(); //保存を忘れずに
        
        return to_route('inertia.index') 
        ->with([ // フラッシュメッセージ
            'message' => '登録しました'
        ]);
    }

    public function delete($id)
    {
        // 削除処理
        $blog = InertiaTest::findOrFail($id);
        $blog->delete();

     return to_route('inertia.index')
     ->with([ 
        'message' => '削除しました'
     ]);
    }
}
