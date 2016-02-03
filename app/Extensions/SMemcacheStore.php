<?php
namespace App\Extensions;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Cache\TaggableStore;
use Memcache,MyHelper,Config;

class SMemcacheStore implements Store{
//class SMemcacheStore extends TaggableStore implements Store{

    /**
     * The Memcached instance.
     *
     * @var \Memcached
     */
    protected $memcache;

    /**
     * A string that should be prepended to keys.
     *
     * @var string
     */
    protected $prefix;

    /**
     * Create a new Memcached store.
     *
     * @param  \Memcached  $memcache
     * @param  string     $prefix
     * @return void
     */
    public function __construct(Memcache $memcache, $prefix = '')
    {
        $this->memcache = $memcache;
        $this->prefix = strlen($prefix) > 0 ? $prefix.':' : '';
    }

    /**
     * @function        set_connect
     * @author          ${USER}
     * @copyright       PublishTeam
     * @param $name_connect
     * @param string $prefix
     * @return          $this
     *
     */
    public function set_connect($name_connect,$prefix = ''){
        $this->prefix = strlen($prefix) > 0 ? $prefix.':' : Config::get('cache.prefix').':';
        $servers = Config::get('cache.connections.'.$name_connect);
        $this->memcache = MyHelper::MemcacheConnect($servers);
        return $this;
    }


    /**
     * Retrieve an item from the cache by key.
     *
     * @param  string  $key
     * @return mixed
     */
    public function get($key){
        if( $value = $this->memcache->get($this->prefix.$key) ) {
            return $value;
        }
    }


    /**
     * Store an item in the cache for a given number of minutes.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @param  int     $minutes
     * @return void
     */
    public function put($key, $value, $minutes)
    {
        $this->memcache->set($this->prefix.$key, $value, false, $minutes * 60);
    }

    /**
     * Increment the value of an item in the cache.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     */
    public function increment($key, $value = 1)
    {
        return $this->memcache->increment($this->prefix.$key, $value);
    }

    /**
     * Decrement the value of an item in the cache.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     */
    public function decrement($key, $value = 1)
    {
        return $this->memcache->decrement($this->prefix.$key, $value);
    }

    /**
     * Store an item in the cache indefinitely.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     */
    public function forever($key, $value)
    {
        return $this->put($key, $value, 0);
    }

    /**
     * Remove an item from the cache.
     *
     * @param  string  $key
     * @return void
     */
    public function forget($key)
    {
        $this->memcache->delete($this->prefix.$key);
    }

    /**
     * Remove all items from the cache.
     *
     * @return void
     */
    public function flush()
    {
        $this->memcache->flush();
    }

    /**
     * Get the underlying Memcached connection.
     *
     * @return \Memcached
     */
    public function getMemcache()
    {
        return $this->memcache;
    }

    /**
     * Get the cache key prefix.
     *
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * Retrieve multiple items from the cache by key.
     *
     * Items not found in the cache will have a null value.
     *
     * @param  array  $keys
     * @return array
     */
    public function many(array $keys){
        return false;
    }

    /**
     * Store multiple items in the cache for a given number of minutes.
     *
     * @param  array  $values
     * @param  int  $minutes
     * @return void
     */
    public function putMany(array $values, $minutes){
        return false;
    }

}
