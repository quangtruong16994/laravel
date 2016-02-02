<?php

use Symfony\Component\HttpFoundation\Session\Storage\Handler\MemcacheSessionHandler;
use Illuminate\Support\Manager;

class SSessionMemcacheDriver extends Manager  {
    /**
     * Create an instance of the database session driver.
     *
     * @return \Illuminate\Session\Store
     */
    protected function createMemcacheDriver()
    {
        $servers = $this->app['config']['cache.stores.all_session.servers'];
        return new MemcacheSessionHandler($this->connect($servers), array());
    }

    /**
     * Create a new Memcache connection.
     * @param array  $servers
     * @return \Memcache
     *
     * @throws \RuntimeException
     */
    public function connect(array $servers)
    {
        $memcache = new \Memcache();

        // For each server in the array, we'll just extract the configuration and add
        // the server to the Memcached connection. Once we have added all of these
        // servers we'll verify the connection is successful and return it back.
        foreach ($servers as $server)
        {
            $memcache->addServer(
                $server['host'], $server['port'], $server['weight']
            );
        }

        if ($memcache->getVersion() === false){
            throw new \RuntimeException("Could not establish Memcache connection.");
        }

        return $memcache;
    }

    /**
     * Get the default session driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return 'memcache';
    }
}//class
