<?php
/**
 * Created by PhpStorm.
 * User: knight
 * Date: 2018/6/12
 * Time: 11:30 AM
 */
namespace yiipush\umeng;

require 'Push/Upush.php';
use yii\base\Component;

class Umeng extends Component
{
	public function sendUpush($type)
	{
		$push = new Upush\Upush();
		$push->sendAndroidUnicast();
	}

}