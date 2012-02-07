<?php
//Post.class.php
//See http://www.tonymarston.net/php-mysql/many-to-many.html

require_once 'DB.class.php';

class Post {
	
	public $id;
	public $location;
	public $title;
	public $description;
	public $price;
	public $capacity;
	public $starttime;
	public $duration;

	//Constructor (arguement takes associative array w/ the DB row )
	function __construct($data) {
		$this->id = (isset($data['id'])) ? $data['id'] : "";
		$this->location = (isset($data['location'])) ? $data['location'] : "";
		$this->title = (isset($data['title'])) ? $data['title'] : "";
		$this->description = (isset($data['description'])) ? $data['description'] : "";
		$this->price = (isset($data['price'])) ? $data['price'] : "";
		$this->capacity = (isset($data['capacity'])) ? $data['capacity'] : "";
		$this->start = (isset($data['start'])) ? $data['start'] : "";
		$this->duration = (isset($data['duration'])) ? $data['duration'] : "";
	}

	public function save($isNewPost = false) {
		//create a new database object.
		$db = new DB();

		//if just updating existing post
		if(!$isNewPost) {
			//set data array
			$data = array(
				"location" => "'$this->location'",
				"title" => "'$this->title'",
				"description" => "'$this->description'",
				"price" => "'$this->price'",
				"capacity" => "'$this->capacity'",
				"duration" => "'$this->duration'"
			);

			//update row in db
			$db->update($data, 'posts', 'id = '.$this->id);
		}
		//if creating new post
		else
		{	
			//set data array
			$data = array(
				"location" => "'$this->location'",
				"title" => "'$this->title'",
				"description" => "'$this->description'",
				"price" => "'$this->price'",
				"capacity" => "'$this->capacity'",
				"start" => "'".date("Y-m-d H:i:s",time())."'",
				"duration" => "'$this->duration'"
			);

			$this->id = $db->insert($data, 'posts');
			$this->start = time();
		}
		return true;
	}
}

?>