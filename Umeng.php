<?php
/**
 * Created by PhpStorm.
 * User: knight
 * Date: 2018/6/12
 * Time: 11:30 AM
 */

namespace yiipush\umeng;

use yiipush\umeng\Upush\Upush;
//use yii\base\Component;

class Umeng extends Component
{
	public function sendUpush()
	{
		$push = new Upush();
		$push->sendAndroidUnicast();
	}

}