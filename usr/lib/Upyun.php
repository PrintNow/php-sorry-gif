<?php


use GuzzleHttp\Client;

class Upyun
{
	private $key;
	private $secret;

	public function __construct($key ,$secret)
	{
		$this->key = $key;
		$this->secret = $secret;
	}

	/**
	 * 执行
	 * @param $text
	 * @return mixed
	 * @copyright ©devttl https://system.out.println.org. all rights reserved.
	 */
	public function execute(string $text): iterable
	{
		$invalidState = $this->invalidText($text);
		switch ($invalidState) {
			case 1:
				return [
					'msg'  => '内容不符合社会主义核心价值观 !' ,
					'text' => $text ,
					'code' => 401
				];
			case 2:
				return [
					'msg'  => '内容好像不符合社会主义核心价值观 !' ,
					'text' => $text ,
					'code' => 401
				];
		}

		return [
			'code' => 200
		];
	}

	/**
	 * 又拍云文本内容检测
	 * @param $text
	 * @return bool
	 * @copyright ©devttl https://system.out.println.org. all rights reserved.
	 */
	private function invalidText($text)
	{
		try {
			$key = $this->key;
			$secret = $this->secret;
			$uri = '/text/check?act=spam';
			$method = 'POST';
			$date = gmdate('D, d M Y H:i:s \G\M\T');

			$sign = function ($key ,$secret ,$method ,$uri ,$date ,$policy = null ,$md5 = null) {
				$elems = array();
				foreach (array($method ,$uri ,$date ,$policy ,$md5) as $v) {
					if ($v) {
						$elems[] = $v;
					}
				}

				$value = implode('&' ,$elems);
				$sign = base64_encode(hash_hmac('sha1' ,$value ,$secret ,true));
				return 'UPYUN ' . $key . ':' . $sign;
			};

			$sign = $sign($key ,$secret ,$method ,$uri ,$date);

			$cli = new Client([
				'headers' => [
					'Content-Type'  => 'application/json' ,
					'authorization' => $sign ,
					'date'          => $date ,
				]
			]);

			$res = $cli->post('http://banma.api.upyun.com/text/check?act=spam' ,[
				'body' => json_encode([
					'text' => $text
				] ,JSON_UNESCAPED_UNICODE)
			]);

			$res = json_decode($res->getBody()
				->getContents() ,true);

			if (array_key_exists('spam' ,$res)) {
				return $res['spam']['label'];
			}

			return false;
		} catch (\Exception $exception) {
			return false;
		}
	}
}