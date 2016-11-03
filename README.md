# DesignPattern
**DesignPattern** library allow you to simply include design pattern like **Singleton** or **Multiton** into your classes.

## Installation
Use `composer require jpc/design-pattern` to install with composer.

## How to use

### Create the singleton class
Create your class which you want to be a Singleton class.

```php
<?php
	class MySingletonClass {
    	// Some properties and functions
        
        public function __construct($myFristParam, $mySecondParam){
        	//...
        }
    }
?>
```

Then, add the Singleton trait.

```php
<?php
	class MySingletonClass {
    
    	use JPC\DesignPattern\Singleton;
    
    	// Some properties and functions
        
        public function __construct($myFristParam, $mySecondParam){
        	//...
        }
    }
?>
```

### Get the Singleton class

You can simply use the static function `getInstance` to get singleton instance.

```php
//Some Code
$mySingleton = MySingletonClass::getInstance($param1, $param2);
//Some Code
```

#### For __Multiton__

The unique difference between Singleton and Multiton is when you get the instance, you have to pass an identifier like that :

```php
//Some Code
$myMultiton = MyMultitonClass::getInstance("IDENTIFIER", $param1, $param2);
//Some Code
```

It's allow you to make different instance with different parameters.

## Thanks You!

Thanks you for reading and maybe for downloading and use this library! If you have some request, make them and i will code it for you!