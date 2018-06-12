<?php
namespace yiipush\umeng;

class AndroidBroadcast extends \AndroidNotification {
	function  __construct() {
		parent::__construct();
		$this->data["type"] = "broadcast";
	}
}