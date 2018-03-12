<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("LINE_MESSAGING_API_CHANNEL_ACCESS_TOKEN", "HcFHTh85/WUrDeR85X7MjkKHK1QLkyadxIYs0UCCZ+D7/DmdGd0f5HrWslIOeS/9ONeSJK5XmKzZPOIRwB7usy99mRvB8z8dj5X0OV6xBWFSYErp2zdZgejqTT5T/zcbZZj/EQ5wxfxKnz4WvM7UMwdB04t89/1O/w1cDnyilFU=");
define("LINE_MESSAGING_API_CHANNEL_SECRET", "2e54360ce915aeb46e95c54cf392d685");

include ('line-bot-api/php/line-bot.php');

$bot = new BOT_API(LINE_MESSAGING_API_CHANNEL_SECRET, LINE_MESSAGING_API_CHANNEL_ACCESS_TOKEN);
	
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