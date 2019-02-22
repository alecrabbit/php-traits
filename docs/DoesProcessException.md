##### trait DoesProcessException
##### Usage
```php
class SomeCLass
{
    use DoesProcessException;

    public function someMethod()
    {
        try {
            // throws an Exception
        } catch (\Throwable $e) {
            $this->processException($e);
        }
    }
}

$o = new SomeClass();

$o->someMethod(); // Exception throwed
```

To enable dumping of exception you should declare some constants:
```php
if (!defined('APP_DEBUG')) {
    define('APP_DEBUG', true);
}

if (defined('APP_DEBUG') && APP_DEBUG) {
    if (!defined('DEBUG_DUMP_EXCEPTION')) {
        define('DEBUG_DUMP_EXCEPTION', true); // change to 'true' to dump exception message and trace
    }
    if (!defined('DEBUG_DUMP_EXCEPTION_OBJECT')) {
        define('DEBUG_DUMP_EXCEPTION_OBJECT', true); // change to 'true' to dump exception class
    }
}
```
> Note: See [debug.php](https://github.com/alecrabbit/php-accessories/blob/master/tests/debug.php)

If you don't need exception to be thrown disable it:
```php
$o->doNotThrowOnError();
```
> Note: Be careful you can end up with silent script... no dumps, no exceptions... 
