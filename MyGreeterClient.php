<?php

	namespace MyGreeter;

	class Client
	{
		public $time;

		public function __construct ($time)
		{
			$this->time = $time;
		}

		/*
		 * $time  时间戳
		 * return String 问候语
		 * */
		public function getResult ()
		{
			//当前时间
			$nowTime = $this->check_time();
			//早上好开始时间
			$good_morning_time = strtotime(date('Y-m-d', $nowTime));
			//下午好开始时间
			$good_afternoon_time = strtotime(date('Y-m-d 12:00:00', $nowTime));
			//晚上好开始时间
			$good_evening_time = strtotime(date('Y-m-d 18:00:00', $nowTime));
			if ($nowTime >= $good_morning_time && $nowTime < $good_afternoon_time) {
				return "早上好";
			} elseif ($nowTime >= $good_afternoon_time && $nowTime < $good_evening_time) {
				return "中午好";
			} else {
				return "晚上好";
			}
		}

		public function check_time ()
		{
			if (empty($this->time) || strtotime(date('Y-m-d H:i:s', $this->time)) != $this->time) {
				return time();
			}

			return $this->time;
		}
	}