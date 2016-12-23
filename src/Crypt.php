<?php
/** .-------------------------------------------------------------------
 * |  Software: [HDCMS framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
namespace houdunwang\crypt;

use houdunwang\crypt\build\Base;

class Crypt {
	protected $link;

	public function __call( $method, $params ) {
		if ( ! $this->link ) {
			$this->link = new Base();
		}

		return call_user_func_array( [ $this->link, $method ], $params );
	}

	public static function __callStatic( $name, $arguments ) {
		static $link = null;
		if ( is_null( $link ) ) {
			$link = new Crypt();
		}

		return call_user_func_array( [ $link, $name ], $arguments );
	}
}