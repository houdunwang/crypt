# 加密解密

##介绍

加密组件提供快捷的加密解密操作, 使用设置的密钥实现安全的数据加密处理。

[TOC]

#开始使用

####安装组件
使用 composer 命令进行安装或下载源代码使用。

```
composer require houdunwang/crypt
```
> HDPHP 框架已经内置此组件，无需要安装

####配置
```
$config=[
	'key'=>"sdkdsklldsksdksdksdkldsklsdkllksd"
];
\houdunwang\config\Config::set('crypt',$config);
```

####说明
调用方式分两种:

实例化对象调用时会产生多个实例
```
$obj1 = new \houdunwang\crypt\Crypt();
$obj1->encrypt('3');
$obj2 = new \houdunwang\crypt\Crypt();
$obj3->encrypt('3');
```

通过类名以静态方法调用时,系统只生成一个对象实例
```
\houdunwang\crypt\Crypt::encrypt('a');
\houdunwang\crypt\Crypt::encrypt('b');
```

####配置密钥
不设置密钥时将使用默认密钥
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