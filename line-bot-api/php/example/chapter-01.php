<?php

include ('line-bot-api/php/line-bot.php');

$channelSecret = '2e54360ce915aeb46e95c54cf392d685';
$access_token  = 'HcFHTh85/WUrDeR85X7MjkKHK1QLkyadxIYs0UCCZ+D7/DmdGd0f5HrWslIOeS/9ONeSJK5XmKzZPOIRwB7usy99mRvB8z8dj5X0OV6xBWFSYErp2zdZgejqTT5T/zcbZZj/EQ5wxfxKnz4WvM7UMwdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);
	
if (!empty($bot->isEvents)) {
		
    $bot->replyMessageNew($bot->replyToken, json_encode($bot->message));

    if ($bot->isSuccess()) {
        echo 'Succeeded!';
        exit();
    }

    // Failed
    echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
    exit();

}
