<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
	// 各アクションの前に実行させるミドルウェア
	public function __construct()
	{
		// メール認証前でもアカウント削除は許可
		$this->middleware('auth')->except(['destroy']);
		$this->middleware('verified')->except(['index', 'show', 'destroy']);
	}

	// ユーザー一覧表示
	public function index()
	{
		$users = User::paginate(10);
		return view('users.index', ['users' => $users]);
	}

	// 新規登録フォームへ移動
	public function create()
	{
		return view('users.create');
	}

	// 新規登録処理
	// そのままユーザーページへリダイレクト
	public function store(Request $request)
	{
		$user = new User;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = $request->password;
		$user->save();
		return redirect('users/'.$user->id);
	}

	// $userのページを表示
	public function show(User $user)
	{
		// 最新5冊を取得
		$user->books = $user->books()->paginate(5);
		return view('users.show', ['user' => $user]);
	}

	// 更新フォームへ移動
	public function edit(User $user)
	{
		$this->authorize('edit', $user);
		return view('users.edit', ['user' => $user]);
	}

	// 更新処理
	// そのままユーザーページへリダイレクト
	public function update(Request $request, User $user)
	{
		$this->authorize('edit', $user);
		$user->name = $request->name;
		$user->save();
		return redirect('users/'.$user->id);
	}

	// 削除処理
	// そのままユーザー一覧へリダイレクト
	public function destroy(User $user)
	{
		$this->authorize('edit', $user);
		$user->delete();
		return redirect('users');
	}
}
