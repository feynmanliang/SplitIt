<?php
//PostTools.class.php

require_once 'Post.class.php';
require_once 'DB.class.php';

class PostTools {

	//Adds user to post
	//If user is already joined to post, removes user
	public function joinuserpost($userid)
	{
		//If logged in
		if($_SESSION["logged_in"] = 1)
		{
			//Returns 0 only if user is not joined to post
			$isjoined = mysql_query("SELECT * FROM relationships WHERE userid = '$userid' AND postid = '$this->id'");

			if(mysql_num_rows($isjoined) == 0)
			{
				//Counts number of users already joined
				$spacefilled = mysql_query("SELECT * FROM relationships WHERE postid = '$this->id'");

				//If # joined users is under capacity, join user to post
				if(($this->capacity) > (mysql_num_rows($spacefilled)))
				{
					$data = array(
						"userid" => "'$userid'",
						"postid" => "'$this->id'"
					);

					$db = new DB();
					$db->insert($data, 'relationships');
					
					return true;
				}
				else {return false;}
			}
			//If user already joined to post, delete relationship
			else
			{
				$db = new DB();

				$db->delete('relationships', "postid = $this->id");
				return true;
			}
		}
		//If not logged in
		else
		{
			return false;	
		}
	}

	public function deletepost()
	{
		$db = new DB();
		$db->delete('posts', "id = $id");

		return true;
	}


	//get a post
	//returns a post object. Takes the posts id as an input
	public function getpost($id)
	{
		$db = new DB();
		$result = $db->select('posts', "id = $id");

		return new Post($result);
	}

}

?>
