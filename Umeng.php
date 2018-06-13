<?php

namespace yiipush\umeng;

require_once(dirname(__FILE__) . '/' . 'core/android/AndroidBroadcast.php');
require_once(dirname(__FILE__) . '/' . 'core/android/AndroidFilecast.php');
require_once(dirname(__FILE__) . '/' . 'core/android/AndroidGroupcast.php');
require_once(dirname(__FILE__) . '/' . 'core/android/AndroidUnicast.php');
require_once(dirname(__FILE__) . '/' . 'core/android/AndroidListcast.php');
require_once(dirname(__FILE__) . '/' . 'core/android/AndroidCustomizedcast.php');
require_once(dirname(__FILE__) . '/' . 'core/ios/IOSBroadcast.php');
require_once(dirname(__FILE__) . '/' . 'core/ios/IOSFilecast.php');
require_once(dirname(__FILE__) . '/' . 'core/ios/IOSGroupcast.php');
require_once(dirname(__FILE__) . '/' . 'core/ios/IOSUnicast.php');
require_once(dirname(__FILE__) . '/' . 'core/ios/IOSListcast.php');
require_once(dirname(__FILE__) . '/' . 'core/ios/IOSCustomizedcast.php');

use yii\base\Component;

class Umeng extends Component
{
	public $appkey;
	public $appMasterSecret;
	protected $timestamp;
	protected $validation_token;

	public function __construct ()
	{
		$this->timestamp = strval(time());
	}

	public function sendAndroidBroadcast ($params=[])
	{
		try {
			$brocast = new AndroidBroadcast();
			$brocast->setAppMasterSecret($this->appMasterSecret);
			$brocast->setPredefinedKeyValue("appkey", $this->appkey);
			$brocast->setPredefinedKeyValue("timestamp", $this->timestamp);
			$brocast->setPredefinedKeyValue("ticker", $params['ticker']);
			$brocast->setPredefinedKeyValue("title", $params['title']);
			$brocast->setPredefinedKeyValue("text", $params['text']);
			$brocast->setPredefinedKeyValue("after_open", "go_app");
			// Set 'production_mode' to 'false' if it's a test device. 
			// For how to register a test device, please see the developer doc.
			$brocast->setPredefinedKeyValue("production_mode", "true");
			// [optional]Set extra fields
			$brocast->setExtraField("test", "helloworld");
			print("Sending broadcast notification, please wait...\r\n");
			$brocast->send();
			print("Sent SUCCESS\r\n");
		} catch (\Exception $e) {
			print("Caught exception: " . $e->getMessage());
		}
	}

	public function sendAndroidUnicast ($params)
	{
		try {
			$unicast = new AndroidUnicast();
			$unicast->setAppMasterSecret($this->appMasterSecret);
			$unicast->setPredefinedKeyValue("appkey", $this->appkey);
			$unicast->setPredefinedKeyValue("timestamp", $this->timestamp);
			// Set your device tokens here
			$unicast->setPredefinedKeyValue("device_tokens", $params['device_tokens']);
			$unicast->setPredefinedKeyValue("ticker",$params['ticker']);
			$unicast->setPredefinedKeyValue("title", $params['title']);
			$unicast->setPredefinedKeyValue("text", $params['text']);
			$unicast->setPredefinedKeyValue("after_open", "go_app");
			// Set 'production_mode' to 'false' if it's a test device. 
			// For how to register a test device, please see the developer doc.
			$unicast->setPredefinedKeyValue("production_mode", "true");
			// Set extra fields
			$unicast->setExtraField("test", "helloworld");
			print("Sending unicast notification, please wait...\r\n");
			$unicast->send();
			print("Sent SUCCESS\r\n");
		} catch (\Exception $e) {
			print("Caught exception: " . $e->getMessage());
		}
	}

	public function sendAndroidListcast ($params)
	{
		try {
			$listcast = new AndroidListcast();
			$listcast->setAppMasterSecret($this->appMasterSecret);
			$listcast->setPredefinedKeyValue("appkey", $this->appkey);
			$listcast->setPredefinedKeyValue("timestamp", $this->timestamp);
			// Set your device tokens here
			$listcast->setPredefinedKeyValue("device_tokens",  $params['device_tokens']);
			$listcast->setPredefinedKeyValue("ticker",  $params['ticker']);
			$listcast->setPredefinedKeyValue("title", $params['title']);
			$listcast->setPredefinedKeyValue("text",  $params['text']);
			$listcast->setPredefinedKeyValue("after_open", "go_app");
			// Set 'production_mode' to 'false' if it's a test device.
			// For how to register a test device, please see the developer doc.
			$listcast->setPredefinedKeyValue("production_mode", "true");
			// Set extra fields
			$listcast->setExtraField("test", "helloworld");
			print("Sending unicast notification, please wait...\r\n");
			$listcast->send();
			print("Sent SUCCESS\r\n");
		} catch (\Exception $e) {
			print("Caught exception: " . $e->getMessage());
		}
	}

	public function sendAndroidFilecast ($params)
	{
		try {
			$filecast = new AndroidFilecast();
			$filecast->setAppMasterSecret($this->appMasterSecret);
			$filecast->setPredefinedKeyValue("appkey", $this->appkey);
			$filecast->setPredefinedKeyValue("timestamp", $this->timestamp);
			$filecast->setPredefinedKeyValue("ticker", $params['ticker']);
			$filecast->setPredefinedKeyValue("title", $params['title']);
			$filecast->setPredefinedKeyValue("text", $params['text']);
			$filecast->setPredefinedKeyValue("after_open", "go_app");  //go to app
			print("Uploading file contents, please wait...\r\n");
			// Upload your device tokens, and use '\n' to split them if there are multiple tokens
			$filecast->uploadContents("aa" . "\n" . "bb");
			print("Sending filecast notification, please wait...\r\n");
			$filecast->send();
			print("Sent SUCCESS\r\n");
		} catch (\Exception $e) {
			print("Caught exception: " . $e->getMessage());
		}
	}

	public function sendAndroidGroupcast ($params)
	{
		try {
			$groupcast = new AndroidGroupcast();
			$groupcast->setAppMasterSecret($this->appMasterSecret);
			$groupcast->setPredefinedKeyValue("appkey", $this->appkey);
			$groupcast->setPredefinedKeyValue("timestamp", $this->timestamp);
			// Set the filter condition
			$groupcast->setPredefinedKeyValue("filter", $params['filter']);
			$groupcast->setPredefinedKeyValue("ticker", $params['ticker']);
			$groupcast->setPredefinedKeyValue("title", $params['title']);
			$groupcast->setPredefinedKeyValue("text", $params['text']);
			$groupcast->setPredefinedKeyValue("after_open", "go_app");
			// Set 'production_mode' to 'false' if it's a test device. 
			// For how to register a test device, please see the developer doc.
			$groupcast->setPredefinedKeyValue("production_mode", "true");
			print("Sending groupcast notification, please wait...\r\n");
			$groupcast->send();
			print("Sent SUCCESS\r\n");
		} catch (\Exception $e) {
			print("Caught exception: " . $e->getMessage());
		}
	}

	public function sendAndroidCustomizedcast ($params)
	{
		try {
			$customizedcast = new AndroidCustomizedcast();
			$customizedcast->setAppMasterSecret($this->appMasterSecret);
			$customizedcast->setPredefinedKeyValue("appkey", $this->appkey);
			$customizedcast->setPredefinedKeyValue("timestamp", $this->timestamp);
			// Set your alias here, and use comma to split them if there are multiple alias.
			// And if you have many alias, you can also upload a file containing these alias, then 
			// use file_id to send customized notification.
			$customizedcast->setPredefinedKeyValue("alias", $params['alias']);
			// Set your alias_type here
			$customizedcast->setPredefinedKeyValue("alias_type", $params['alias_type']);
			$customizedcast->setPredefinedKeyValue("ticker", $params['ticker']);
			$customizedcast->setPredefinedKeyValue("title", $params['title']);
			$customizedcast->setPredefinedKeyValue("text", $params['text']);
			$customizedcast->setPredefinedKeyValue("after_open", "go_app");
			print("Sending customizedcast notification, please wait...\r\n");
			$customizedcast->send();
			print("Sent SUCCESS\r\n");
		} catch (\Exception $e) {
			print("Caught exception: " . $e->getMessage());
		}
	}

	public function sendAndroidCustomizedcastFileId ($params)
	{
		try {
			$customizedcast = new AndroidCustomizedcast();
			$customizedcast->setAppMasterSecret($this->appMasterSecret);
			$customizedcast->setPredefinedKeyValue("appkey", $this->appkey);
			$customizedcast->setPredefinedKeyValue("timestamp", $this->timestamp);
			// if you have many alias, you can also upload a file containing these alias, then
			// use file_id to send customized notification.
			$customizedcast->uploadContents($params['content']);
			// Set your alias_type here
			$customizedcast->setPredefinedKeyValue("alias_type",$params['alias_type']);
			$customizedcast->setPredefinedKeyValue("ticker", $params['ticker']);
			$customizedcast->setPredefinedKeyValue("title", $params['title']);
			$customizedcast->setPredefinedKeyValue("text", $params['text']);
			$customizedcast->setPredefinedKeyValue("after_open", "go_app");
			print("Sending customizedcast notification, please wait...\r\n");
			$customizedcast->send();
			print("Sent SUCCESS\r\n");
		} catch (\Exception $e) {
			print("Caught exception: " . $e->getMessage());
		}
	}

	public function sendIOSBroadcast ($params)
	{
		try {
			$brocast = new IOSBroadcast();
			$brocast->setAppMasterSecret($this->appMasterSecret);
			$brocast->setPredefinedKeyValue("appkey", $this->appkey);
			$brocast->setPredefinedKeyValue("timestamp", $this->timestamp);

			$brocast->setPredefinedKeyValue("alert",$params['alert']);
			$brocast->setPredefinedKeyValue("badge", 0);
			$brocast->setPredefinedKeyValue("sound", "chime");
			// Set 'production_mode' to 'true' if your app is under production mode
			$brocast->setPredefinedKeyValue("production_mode", "false");
			// Set customized fields
			$brocast->setCustomizedField("test",$params['test']);
			print("Sending broadcast notification, please wait...\r\n");
			$brocast->send();
			print("Sent SUCCESS\r\n");
		} catch (\Exception $e) {
			print("Caught exception: " . $e->getMessage());
		}
	}

	public function sendIOSUnicast ($params)
	{
		try {
			$unicast = new IOSUnicast();
			$unicast->setAppMasterSecret($this->appMasterSecret);
			$unicast->setPredefinedKeyValue("appkey", $this->appkey);
			$unicast->setPredefinedKeyValue("timestamp", $this->timestamp);
			// Set your device tokens here
			$unicast->setPredefinedKeyValue("device_tokens", $params['device_tokens']);
			$unicast->setPredefinedKeyValue("alert", $params['alert']);
			$unicast->setPredefinedKeyValue("badge", 0);
			$unicast->setPredefinedKeyValue("sound", "chime");
			// Set 'production_mode' to 'true' if your app is under production mode
			$unicast->setPredefinedKeyValue("production_mode", "false");
			// Set customized fields
			$unicast->setCustomizedField("test",  $params['test']);
			print("Sending unicast notification, please wait...\r\n");
			$unicast->send();
			print("Sent SUCCESS\r\n");
		} catch (\Exception $e) {
			print("Caught exception: " . $e->getMessage());
		}
	}

	public function sendIOSListcast ($params)
	{
		try {
			$unicast = new IOSListcast();
			$unicast->setAppMasterSecret($this->appMasterSecret);
			$unicast->setPredefinedKeyValue("appkey", $this->appkey);
			$unicast->setPredefinedKeyValue("timestamp", $this->timestamp);
			// Set your device tokens here
			$unicast->setPredefinedKeyValue("device_tokens",$params['device_tokens']);
			$unicast->setPredefinedKeyValue("alert", $params['alert']);
			$unicast->setPredefinedKeyValue("badge", 0);
			$unicast->setPredefinedKeyValue("sound", "chime");
			// Set 'production_mode' to 'true' if your app is under production mode
			$unicast->setPredefinedKeyValue("production_mode", "false");
			// Set customized fields
			$unicast->setCustomizedField("test",$params['test']);
			print("Sending unicast notification, please wait...\r\n");
			$unicast->send();
			print("Sent SUCCESS\r\n");
		} catch (\Exception $e) {
			print("Caught exception: " . $e->getMessage());
		}
	}

	public function sendIOSFilecast ($params)
	{
		try {
			$filecast = new IOSFilecast();
			$filecast->setAppMasterSecret($this->appMasterSecret);
			$filecast->setPredefinedKeyValue("appkey", $this->appkey);
			$filecast->setPredefinedKeyValue("timestamp", $this->timestamp);

			$filecast->setPredefinedKeyValue("alert",  $params['alert']);
			$filecast->setPredefinedKeyValue("badge", 0);
			$filecast->setPredefinedKeyValue("sound", "chime");
			// Set 'production_mode' to 'true' if your app is under production mode
			$filecast->setPredefinedKeyValue("production_mode", "false");
			print("Uploading file contents, please wait...\r\n");
			// Upload your device tokens, and use '\n' to split them if there are multiple tokens
			$filecast->uploadContents( $params['content']);
			print("Sending filecast notification, please wait...\r\n");
			$filecast->send();
			print("Sent SUCCESS\r\n");
		} catch (\Exception $e) {
			print("Caught exception: " . $e->getMessage());
		}
	}

	public function sendIOSGroupcast ($params)
	{
		try {
			$groupcast = new IOSGroupcast();
			$groupcast->setAppMasterSecret($this->appMasterSecret);
			$groupcast->setPredefinedKeyValue("appkey", $this->appkey);
			$groupcast->setPredefinedKeyValue("timestamp", $this->timestamp);
			// Set the filter condition
			$groupcast->setPredefinedKeyValue("filter",  $params['filter']);
			$groupcast->setPredefinedKeyValue("alert",  $params['alert']);
			$groupcast->setPredefinedKeyValue("badge", 0);
			$groupcast->setPredefinedKeyValue("sound", "chime");
			// Set 'production_mode' to 'true' if your app is under production mode
			$groupcast->setPredefinedKeyValue("production_mode", "false");
			print("Sending groupcast notification, please wait...\r\n");
			$groupcast->send();
			print("Sent SUCCESS\r\n");
		} catch (\Exception $e) {
			print("Caught exception: " . $e->getMessage());
		}
	}

	public function sendIOSCustomizedcast ($params)
	{
		try {
			$customizedcast = new IOSCustomizedcast();
			$customizedcast->setAppMasterSecret($this->appMasterSecret);
			$customizedcast->setPredefinedKeyValue("appkey", $this->appkey);
			$customizedcast->setPredefinedKeyValue("timestamp", $this->timestamp);

			// Set your alias here, and use comma to split them if there are multiple alias.
			// And if you have many alias, you can also upload a file containing these alias, then 
			// use file_id to send customized notification.
			$customizedcast->setPredefinedKeyValue("alias", $params['alias']);
			// Set your alias_type here
			$customizedcast->setPredefinedKeyValue("alias_type", $params['alias_type']);
			$customizedcast->setPredefinedKeyValue("alert",  $params['alert']);
			$customizedcast->setPredefinedKeyValue("badge", 0);
			$customizedcast->setPredefinedKeyValue("sound", "chime");
			// Set 'production_mode' to 'true' if your app is under production mode
			$customizedcast->setPredefinedKeyValue("production_mode", "false");
			print("Sending customizedcast notification, please wait...\r\n");
			$customizedcast->send();
			print("Sent SUCCESS\r\n");
		} catch (\Exception $e) {
			print("Caught exception: " . $e->getMessage());
		}
	}
}