# 加密

##介绍

crypt加密组件包提供功能强大的加密功能。

[TOC]

##用法
####生成实例
```
$obj = new houdunwang\crypt\Crypt();
```

####配置密钥
```
$key = 'houdunwang.com';
$obj->setSecureKey($key);
```

####加密

```
$encrypted = $obj->encrypt('后盾网  人人做后盾');
```

```
//自定义密钥,解密时使用相同密钥才可解
$encrypted = $obj->encrypt('后盾网  人人做后盾','houdunwang.com');
```

####解密

```
$decrypted = $obj->decrypt($encryptedValue);
```
```
//自定义密钥,使用加密时相同的密钥才可解
$decrypted = $obj->decrypt($encryptedValue,'houdunwang.com');
```