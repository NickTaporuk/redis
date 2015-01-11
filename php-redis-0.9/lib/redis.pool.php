<?

class redis_pool
{
	private static $connections = array();
	private static $servers = array();

	public static function add_servers( $list )
	{
		foreach ( $list as $alias => $data )
		{
			self::$servers[$alias] = $data;
		}
	}

	public static function get( $alias )
	{
		if ( !array_key_exists($alias, self::$connections) )
		{
			require_once 'config/app.php';
			self::add_servers($redis_pool);
//			var_dump(self::$servers[$alias][0]);

			self::$connections[$alias] = new php_redis(self::$servers[$alias][0], self::$servers[$alias][1]);
//			var_dump(self::$connections[$alias]);
		}

		return self::$connections[$alias];
	}
}