<?php
namespace yiipush\umeng;

class IOSBroadcast extends \IOSNotification
{
	function __construct ()
	{
		parent::__construct();
		$this->data["type"] = "broadcast";
	}
}