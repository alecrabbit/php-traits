Nameable ⇒ GettableName ⇒ DefaultableName


##### trait DefaultableName
```php
/**
 * @param string|null $name
 * @return string
 */
public function defaultName(?string $name = null): string
{
    return $name ?? DEFAULT_NAME; // 'default_name'
}
```
##### trait GettableName
```php
use DefaultableName;

/** @var string */
protected $name;

/**
 * @return string
 */
public function getName(): string
{
    return $this->name;
    }
```

##### trait Nameable
```php
use GettableName;

/**
 * @param string $name
 * @return self
 */
public function setName(string $name): self
{
    $this->name = $name;
    return $this;
}
```
