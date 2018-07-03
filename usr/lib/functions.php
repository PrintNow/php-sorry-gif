<?php
/**
  * @author   NowTime <wenzhouchan@gmail.com>
  * @link     https://github.com/PrintNow/php-sorry-gif
  *
  * @param  string  $filepath 需要上传文件的绝对路径
*/
function upload_to_sogou($filepath) {
  if (class_exists('\CURLFile')) {
		$field = array('fieldname' => new \CURLFile(realpath($filepath)));
	} else {
		$field = array('fieldname' => '@' . realpath($filepath));
	}

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'http://pic.sogou.com/pic/upload_pic.jsp');
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, true); //POST提交
	curl_setopt($ch, CURLOPT_POSTFIELDS, $field);

	if (class_exists('\CURLFile')) {
		curl_setopt($ch, CURLOPT_SAFE_UPLOAD, true);
	} else {
		if (defined('CURLOPT_SAFE_UPLOAD')) {
			curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
		}
	}

	$data =curl_exec($ch);
	curl_close($ch);
  $parts = parse_url($data);

  if(!empty($data) && $parts !== false && filesize($filepath)<10000000){
    return [
      'host' => ['img.sogoucdn.com','img01.sogoucdn.com','img02.sogoucdn.com','img03.sogoucdn.com','img04.sogoucdn.com'],
      'path' => $parts['path']
    ];
  }else{
    return false;
  }

}
