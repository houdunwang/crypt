<?php
if ( ! function_exists( 'encrypt' ) ) {
	/**
	 * 加密
	 * @param $content
	 *
	 * @return mixed
	 */
	function encrypt( $content ) {
		return Crypt::encrypt( $content, 'houdunwang.com' );
	}
}

if ( ! function_exists( 'decrypt' ) ) {
	/**
	 * 解密
	 * @param $content
	 *
	 * @return mixed
	 */
	function decrypt( $content ) {
		return Crypt::decrypt( $content, 'houdunwang.com' );
	}
}