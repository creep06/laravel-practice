<?php

namespace App\Policies;

use App\User;
use App\Book;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
	use HandlesAuthorization;

	/**
	 * Create a new policy instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	// 管理者には全ての行動を許可
	public function before($user, $ability)
	{
		return $user->isAdmin() ? true : null;
	}

	// 編集と削除の許可
	public function edit(User $user, Book $book)
	{
		return $user->id == $book->user_id;
	}
}
