<?php
$memcache = new Memcache;
$memcache->connect('localhost', 11211) or die ("Could not connect");
$ver = $memcache->getVersion();
echo "Server's version: " . $ver . "<br/>\n";
$oTmp = new stdClass;
$oTmp->str_attr = 'testing memcached';
$oTmp->int_attr = 12345;
$memcache->set('key', $oTmp, false, 10) or
die ("Failed to save data at the server");
echo "Store data in the cache (data will expire in 10 seconds)
<br/>\n";
$res = $memcache->get('key');
echo "Data from the cache:<br/>\n";
var_dump($res);
?>