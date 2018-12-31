##### trait DoesProcessException
```php
    /** @var bool */
    protected $throwOnError = true;

    /** @return self */
    public function doNotThrowOnError(): self
    {
        $this->throwOnError = false;
        return $this;
    }

    /** @return self */
    public function throwOnError(): self
    {
        $this->throwOnError = true;
        return $this;
    }

    /** @return bool */
    public function doesThrowsOnError(): bool
    {
        return $this->throwOnError;
    }

    /**
     * @param \Throwable $e
     * @throws \Throwable
     */
    protected function processException(\Throwable $e): void;
```
##### Usage
```php
class SomeCLass
{
    use DoesProcessException;

    public function someMethod()
    {
        try {
            throw new \Exception('Simulated');
        } catch (\Throwable $e) {
            $this->processException($e);
        }
    }
}

$o = new SomeClass();

//$o->someMethod(); // Exception throwed

//// snippet
//if (!defined('APP_DEBUG')) {
//    define('APP_DEBUG', true);
//}
//
//// snippet
//if (defined('APP_DEBUG') && APP_DEBUG ) {
//    if (!defined('DEBUG_DUMP_EXCEPTION')) {
//        define('DEBUG_DUMP_EXCEPTION', true); // change to 'true' to dump exception message and trace
//    }
//    if (!defined('DEBUG_DUMP_EXCEPTION_CLASS')) {
//        define('DEBUG_DUMP_EXCEPTION_CLASS', true); // change to 'true' to dump exception class
//    }
//}

$o->doNotThrowOnError();
$o->someMethod();

//"[Exception] Simulated"
//"""
//#0 /var/www/.eval/01.php(42): AlecRabbit\SomeCLass->someMethod()\n
//#1 {main}
//"""
//Exception {#27
//    #message: "Simulated"
//    #code: 0
//    #file: "/var/www/.eval/01.php"
//    #line: 16
//    trace: {
//        /var/www/.eval/01.php:16 {
//            › try {
//                ›     throw new \Exception('Simulated');
//      › } catch (\Throwable $e) {
//            }
//    /var/www/.eval/01.php:42 { …}
//  }
//}
```
