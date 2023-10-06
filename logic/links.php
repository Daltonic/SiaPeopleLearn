<?php
class links extends boiler
{
	public function defaultb($code)
	{
		$link = $this->db->query("SELECT * FROM links WHERE short_code='$code' AND deleted=false");

		if ($link->num_rows > 0) {
			$link = $link->fetch_assoc();
			$this->db->query("UPDATE links SET viewers=viewers+1 WHERE short_code='$code'");
			header("location:" . $link['url']);
		} else {
			header("location:" . BURL);
		}
	}
}
