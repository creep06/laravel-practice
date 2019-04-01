<?php
if (! function_exists('my_is_current_controller')) {
	/**
	 * 現在のコントローラ名が、複数の名前のどれかに一致するかどうかを判別する
	 *
	 * @param array $names コントローラ名 (可変長引数)
	 * @return bool
	 */
	function my_is_current_controller(...$names)
	{
		// コントローラ名.アクション名 って形式で今いる位置を取得できる
		// これを'.'でsplitした配列の先頭を取り出す
		$current = explode('.', Route::currentRouteName())[0];
		return in_array($current, $names, true);
	}
}
