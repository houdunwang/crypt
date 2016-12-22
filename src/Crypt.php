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

class Crypt {
	private static $secureKey = '';

	/**
	 * 设置加密密钥
	 *
	 * @param string $key
	 *
	 * @return string
	 */
	public static function key( $key = '' ) {
		if ( ! empty( $key ) ) {
			self::$secureKey = hash( 'sha256', $key, true );
		} else if ( empty( self::$secureKey ) ) {
			self::$secureKey = hash( 'sha256', '405305c793179059f8fd52436876750c587d19ccfbbe2a643743d021dbdcd79c', true );
		}

		return self::$secureKey;
	}

	/**
	 * 加密
	 *
	 * @param string $input 加密字符
	 * @param string $secureKey 加密key
	 *
	 * @return string
	 */
	public static function encrypt( $input, $secureKey = '' ) {
		$secureKey = $secureKey ? hash( 'sha256', $secureKey, true ) : self::key();

		return base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, $secureKey, $input, MCRYPT_MODE_ECB, mcrypt_create_iv( 32 ) ) );
	}

	/**
	 * 解密
	 *
	 * @param string $input 解密字符
	 * @param string $secureKey 加密key
	 *
	 * @return string
	 */
	public static function decrypt( $input, $secureKey = '' ) {
		$secureKey = $secureKey ? hash( 'sha256', $secureKey, true ) : self::key();

		return trim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, $secureKey, base64_decode( $input ), MCRYPT_MODE_ECB, mcrypt_create_iv( 32 ) ) );
	}
}