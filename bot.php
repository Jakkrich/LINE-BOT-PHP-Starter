<?php
require_once '../vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
$LINEBOT_ACCESS_TOKEN="HcFHTh85/WUrDeR85X7MjkKHK1QLkyadxIYs0UCCZ+D7/DmdGd0f5HrWslIOeS/9ONeSJK5XmKzZPOIRwB7usy99mRvB8z8dj5X0OV6xBWFSYErp2zdZgejqTT5T/zcbZZj/EQ5wxfxKnz4WvM7UMwdB04t89/1O/w1cDnyilFU=";
$LINEBOT_CHANNEL_SECRET="2e54360ce915aeb46e95c54cf392d685";
$logger = new Logger('LineBot');
$logger->pushHandler(new StreamHandler('php://stderr', Logger::DEBUG));
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($LINEBOT_ACCESS_TOKEN);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $LINEBOT_CHANNEL_SECRET]);
$signature = $_SERVER['HTTP_' . \LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];
try {
  $events = $bot->parseEventRequest(file_get_contents('php://input'), $signature);
} catch(\LINE\LINEBot\Exception\InvalidSignatureException $e) {
  error_log('parseEventRequest failed. InvalidSignatureException => '.var_export($e, true));
} catch(\LINE\LINEBot\Exception\UnknownEventTypeException $e) {
  error_log('parseEventRequest failed. UnknownEventTypeException => '.var_export($e, true));
} catch(\LINE\LINEBot\Exception\UnknownMessageTypeException $e) {
  error_log('parseEventRequest failed. UnknownMessageTypeException => '.var_export($e, true));
} catch(\LINE\LINEBot\Exception\InvalidEventRequestException $e) {
  error_log('parseEventRequest failed. InvalidEventRequestException => '.var_export($e, true));
}
foreach ($events as $event) {
  // Postback Event
  if (($event instanceof \LINE\LINEBot\Event\PostbackEvent)) {
    $logger->info('Postback message has come');
    continue;
  }
  // Location Event
  if  ($event instanceof LINE\LINEBot\Event\MessageEvent\LocationMessage) {
    $logger->info("location -> ".$event->getLatitude().",".$event->getLongitude());
    continue;
  }
  
  // Message Event = TextMessage
  if (($event instanceof \LINE\LINEBot\Event\MessageEvent\TextMessage)) {
    // get message text
    $messageText=strtolower(trim($event->getText()));
    
  }
}  
	