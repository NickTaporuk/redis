<?

class test
{
	private static $failed = 0;
	private static $passed = 0;

	private static $failed_trace = array();

	public static function assert_value( $got, $should_be, $section = '' )
	{
		self::register_case( $got == $should_be, $section);

		if ( $got != $should_be )
		{
			echo '[Got: ' . $got . ' instead of: ' . $should_be . ']';
		}
	}

	public static function assert_true( $expression, $section = '' )
	{
		self::register_case($expression === true, $section);
	}

	public static function assert_false( $expression, $section = '' )
	{
		self::register_case($expression === false, $section);
	}

	public static function assert_null( $expression, $section = '' )
	{
		self::register_case($expression === null, $section);
	}

	private static function register_case( $passed, $section )
	{
		$passed ? self::$passed++ : self::$failed++;

		if ( $section )
		{
			echo "\n" . $section . "\n";
		}

		echo $passed ? '.' : 'F';

		if ( !$passed )
		{
			$trace = debug_backtrace();
			self::$failed_trace[] = $trace[1];
		}
	}

	public static function summary()
	{
		echo "\n\n" . 'Test summary' . "\n";
		echo 'Passed: ' . self::$passed;
		echo "\n";
		echo 'Failed: ' . self::$failed;

		if ( self::$failed_trace )
		{
			echo "\n\nFailed trace:\n";
			foreach ( self::$failed_trace as $trace )
			{
				echo "- line: {$trace['line']}, {$trace['function']}\n";
			}
		}

		echo "\n";
	}
}