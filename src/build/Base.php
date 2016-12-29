<?php
/** .-------------------------------------------------------------------
 * |  Software: [HDCMS framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
namespace houdunwang\crypt\build;

class Base {
	protected $config;
	protected $secureKey = '405305c793179059f8fd52436876750c587d19ccfbbe2a643743d021dbdcd79c';

	//设置配置项
	public function config( $config, $value = null ) {
		if ( is_array( $config ) ) {
			$this->config = $config;
		} else if ( is_null( $value ) ) {
			return Arr::get( $this->config, $config );
		} else {
			$this->config = Arr::set( $this->config, $config, $value );
		}
		$this->key( $this->config['key'] );

		return $this;
	}

	/**
	 * 设置加密密钥
	 *
	 * @param string $key
	 *
	 * @return string
	 */
	public function key( $key = '' ) {
		$this->secureKey = $key ?: $this->secureKey;

		return hash( 'sha256', $this->secureKey, true );
	}

	/**
	 * 加密
	 *
	 * @param string $input 加密字符
	 * @param string $secureKey 加密key
	 *
	 * @return string
	 */
	public function encrypt( $input, $secureKey = '' ) {
		return base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, $this->key( $secureKey ), $input, MCRYPT_MODE_ECB, mcrypt_create_iv( 32 ) ) );
	}

	/**
	 * 解密
	 *
	 * @param string $input 解密字符
	 * @param string $secureKey 加密key
	 *
	 * @return string
	 */
	public function decrypt( $input, $secureKey = '' ) {

		return trim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, $this->key( $secureKey ), base64_decode( $input ), MCRYPT_MODE_ECB, mcrypt_create_iv( 32 ) ) );
	}
}