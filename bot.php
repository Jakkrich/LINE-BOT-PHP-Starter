<?php
define("LINE_MESSAGING_API_CHANNEL_SECRET", "HcFHTh85/WUrDeR85X7MjkKHK1QLkyadxIYs0UCCZ+D7/DmdGd0f5HrWslIOeS/9ONeSJK5XmKzZPOIRwB7usy99mRvB8z8dj5X0OV6xBWFSYErp2zdZgejqTT5T/zcbZZj/EQ5wxfxKnz4WvM7UMwdB04t89/1O/w1cDnyilFU=");
define("LINE_MESSAGING_API_CHANNEL_TOKEN", "2e54360ce915aeb46e95c54cf392d685");

require __DIR__."/../vendor/autoload.php";

$bot = new \LINE\LINEBot(
    new \LINE\LINEBot\HTTPClient\CurlHTTPClient(LINE_MESSAGING_API_CHANNEL_TOKEN),
    ['channelSecret' => LINE_MESSAGING_API_CHANNEL_SECRET]
);

$signature = $_SERVER["HTTP_".\LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];
$body = file_get_contents("php://input");

$events = $bot->parseEventRequest($body, $signature);

foreach ($events as $event) {
    if ($event instanceof \LINE\LINEBot\Event\MessageEvent\TextMessage) {
        $reply_token = $event->getReplyToken();
        $text = $event->getText();
        $bot->replyText($reply_token, $text);
    }
}

echo "OK";