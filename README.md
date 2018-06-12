# yiipush
友盟推送SDK封装

# 安装
```bash
composer require yiipush/umeng
```

# 配置
```php
<?php

    'push' => [
        'class' => 'yiipush\umeng\Umeng',
        'appkey' => 'xxx',
        'appMasterSecret'=>'xxx'
    ],
  
?>
```

# 使用方式
```php
<?php

    //安卓发送单播
    $params = [
        'ticker'=>'ticker',	
        'title'=>'title',	
        'text'=>'text',	
        'device_tokens'=>'device_tokens',	
    ];
    yii::$app->push->sendAndroidUnicast($params);
    
    //详细的参数可以参照官网或者看Umeng.php

?>
```
