<?

/**
 * Peer class used for entity saving without any list functionality
 */
class redis_peer
{
	protected $name_space;

	public function  __construct()
	{
		$this->name_space = get_class($this);
	}

	/**
	 * @return php_redis
	 */
	public function get_connection()
	{

//		return redis_pool::get('master');
		return redis_pool::get('master');
	}

	public function next_id()
	{
		return $this->get_connection()->inc($this->name_space . 'pk');
	}

	public function last_id()
	{
		return $this->get_connection()->get($this->name_space . 'pk');
	}

	public function insert( $data )
	{
		$data['id'] = $this->next_id();
		$this->get_connection()->set($this->name_space . 'item' . $data['id'], $data);
		return $data['id'];
	}

	public function update( $id, $data )
	{
//		var_dump($this->get_by_id($id));
//		var_dump($data);
		if(!is_array($d = $this->get_by_id($id))) $d = [$d];
		else $d = $this->get_by_id($id);
		$data = array_merge($d, $data);
		var_dump($data);
//		exit;

		$this->get_connection()->set($this->name_space . 'item' . $id, $data);
	}

	public function get_by_id( $id )
	{
//		var_dump($this->get_connection()->get($this->name_space . 'item' . $id));
//		exit;
		return $this->get_connection()->get($this->name_space . 'item' . $id);
	}

	public function delete( $id )
	{
		return $this->get_connection()->delete($this->name_space . 'item' . $id);
	}
}