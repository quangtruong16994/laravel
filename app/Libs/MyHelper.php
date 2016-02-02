<?php

/**
 * Created by PhpStorm.
 * User: vqt
 * Date: 02/02/2016
 * Time: 10:16 SA
 */
class MyHelper{
    public static function MemcacheConnect(array $server = array()){
        if(count($server)<=0){
            $server['host'] = '127.0.0.1';
            $server['port'] = 11211;
            $server['weight'] = '100';
        }
        $memcache = new Memcache();
        if($memcache->connect($server['host'], $server['port'], $server['weight'])){return $memcache;}
        else{
            throw new \RuntimeException("Khong ket noi duoc den memcache tai MemcacheConnect.");
        }
    }//MemcacheConnect
}