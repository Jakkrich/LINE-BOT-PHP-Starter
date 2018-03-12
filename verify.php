<?php
	$access_token = 'HcFHTh85/WUrDeR85X7MjkKHK1QLkyadxIYs0UCCZ+D7/DmdGd0f5HrWslIOeS/9ONeSJK5XmKzZPOIRwB7usy99mRvB8z8dj5X0OV6xBWFSYErp2zdZgejqTT5T/zcbZZj/EQ5wxfxKnz4WvM7UMwdB04t89/1O/w1cDnyilFU=';
	$url = 'https://api.line.me/v1/oauth/verify';
	$headers = array('Authorization: Bearer ' . $access_token);
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$result = curl_exec($ch);
	curl_close($ch);
	echo $result;