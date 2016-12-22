<?php
require 'vendor/autoload.php';
$key = 'sdkdsklldsksdksdksdkldsklsdkllksd';
//设置密钥
\houdunwang\crypt\Crypt::key($key);
echo $d = \houdunwang\crypt\Crypt::encrypt('后盾网人人做后盾');
echo "<hr/>";
echo \houdunwang\crypt\Crypt::decrypt($d);