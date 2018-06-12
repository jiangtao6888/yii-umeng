<?php
namespace yiipush\umeng\Upush;

use yiipush\umeng\Push\Core\AndroidNotification;


class Upush extends AndroidNotification{

	protected $appkey = NULL;
	protected $appMasterSecret = NULL;
	protected $timestamp = NULL;
	protected $validation_token = NULL;

	function __construct ($key='55556a31e0f55a7df300314c', $secret='bqklwcq3prsne6sxmnqcgirwpa9psajw',$type = 'unicast')
	{
		parent::__construct();
		$this->appkey = $key;
		$this->appMasterSecret = $secret;
		$this->timestamp = strval(time());
		$this->data["type"] = $type;
		$this->data["device_tokens"] = NULL;
	}

	function sendAndroidUnicast ()
	{
		try {
			$this->setAppMasterSecret($this->appMasterSecret);
			$this->setPredefinedKeyValue("appkey", $this->appkey);
			$this->setPredefinedKeyValue("timestamp", $this->timestamp);
			// Set your device tokens here
			$this->setPredefinedKeyValue("device_tokens", "ApHTjNqO_LIOnq-MgT8D-xiUPgfR1u231--bRBoo21JB");
			$this->setPredefinedKeyValue("ticker", "Android unicast ticker");
			$this->setPredefinedKeyValue("title", "Android unicast title");
			$this->setPredefinedKeyValue("text", "Android unicast text");
			$this->setPredefinedKeyValue("after_open", "go_app");
			// Set 'production_mode' to 'false' if it's a test device.
			// For how to register a test device, please see the developer doc.
			$this->setPredefinedKeyValue("production_mode", "true");
			// Set extra fields
			$this->setExtraField("test", "helloworld");
			print("Sending unicast notification, please wait...\r\n");
			$this->send();
			print("Sent SUCCESS\r\n");
		} catch (\Exception $e) {
			print("Caught exception: " . $e->getMessage());
		}
	}
}