<?php
namespace yiipush\umeng\Push\Core;



class AndroidBroadcast extends \AndroidNotification {
	function  __construct() {
		parent::__construct();
		$this->data["type"] = "broadcast";
	}
}