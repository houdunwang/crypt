# 加密解密

##介绍

PHP 中的Mcrypt扩充扩展包提供功能强大的加密功能。

[TOC]

#开始使用

####安装组件
使用 composer 命令进行安装或下载源代码使用。

```
composer require houdunwang/crypt
```
> HDPHP 框架已经内置此组件，无需要安装

####配置密钥
可以不执行密钥配置, 系统将使用默认密钥
```
\houdunwang\crypt\Crypt::key('houdunwang.com');
```

####加密操作
```
$encrypted = \houdunwang\crypt\Crypt::encrypt('后盾人  人人做后盾');
```

```
//自定义密钥,解密时使用相同密钥才可解
$encrypted = \houdunwang\crypt\Crypt::encrypt('后盾网  人人做后盾','houdunwang.com');
```

####解密操作
```
$decrypted = \houdunwang\crypt\Crypt::decrypt($encryptedValue);
```
```
//自定义密钥,使用加密时相同的密钥才可解
$decrypted = \houdunwang\crypt\Crypt::decrypt($encryptedValue,'houdunwang.com');
```