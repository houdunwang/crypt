<?php
require 'vendor/autoload.php';

$obj = new houdunwang\crypt\Crypt();
$key = 'sdkdsklldsksdksdksdkldsklsdkllksd';
$obj->setSecureKey($key);
echo $d = $obj->encrypt('后盾网人人做后盾');

echo "<hr/>";
echo $obj->decrypt($d);