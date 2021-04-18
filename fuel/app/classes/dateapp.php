
<?php


class Dateapp extends Date
{
    public static function time_ago($timestamp, $from_timestamp = null, $unit = null)
	{
		if ($timestamp === null)
		{
			return '';
		}

		! is_numeric($timestamp) and $timestamp = static::create_from_string($timestamp)->get_timestamp();

		$from_timestamp == null and $from_timestamp = time();

		\Lang::load('date', true);

		$difference = $from_timestamp - $timestamp;
		$periods    = array('second', 'minute', 'hour', 'day', 'week', 'month', 'year', 'decade');
		$lengths    = array(60, 60, 24, 7, 4.35, 12, 10);

		for ($j = 0; isset($lengths[$j]) and $difference >= $lengths[$j] and (empty($unit) or $unit != $periods[$j]); $j++)
		{
			$difference /= $lengths[$j];
		}

        $difference = round($difference);

		if ($difference != 1)
		{
			$periods[$j] = \Inflector::pluralize($periods[$j]);
		}

		$text = \Lang::get('date.text', array(
			'time' => \Lang::get('date.'.$periods[$j], array('t' => $difference)),
		));

		return $text;
	}
}