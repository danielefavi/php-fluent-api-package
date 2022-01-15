# php-fluent-api-package

PHP package for fluent API interfaces: you can invoke a method both statically and non-statically.

## Installation

```sh
composer require danielefavi/fluent-api
```

## Usage

### 1) Extend your class with `FluentApi` class.

```php
class FluentMath extends FluentApi
{

}
```

### 2) Create your methods that can be invoked statically and non-statically.

Declare the functions that can be called statically or non-statically with an underscore `_`.

In the example below the functions `add` and `subtract` can be invoked statically or non-statically.

```php
class FluentMath extends FluentApi
{
    private $result = 0;

    protected function _add($num)
    {
        $this->result += $num;

        return $this;
    }

    protected function _subtract($num)
    {
        $this->result -= $num;

        return $this;
    }

    public function result()
    {
        return $this->result;
    }
}
```

### 3) Example of usage

```php
$res1 = FluentMath::add(5)
    ->add(3)
    ->subtract(2)
    ->add(8)
    ->result();

$res2 = FluentMath::subtract(1)->add(10)->result();
```