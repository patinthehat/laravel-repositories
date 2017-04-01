## Laravel Repositories ##
---

This package provides a basic Repository pattern implementation for use with Laravel 5+.

### Installation ###
---

This package may be installed with composer:

  `composer require patinthehat/laravel-repositories`


### Usage ###
---

Extend the `Repository` class and define its `model` method to create a repository for that model:
```php
use Permafrost\Repository;

class UserRepository extends Repository
{
    public static function model()
    {
        return 'App\\User';
    }
}
```

The repository can then be used:

```php
  $user = UserRepository::findByFirstName('john');
```

### Dynamic Find Methods ###
---

The `Repository` class allows for dynamic `findByN/findAllByN` method calls, which will search the repository model's field N for its first argument.
For example, 
```php
    UserRepository::findByFirstName('john')
``` 
results in a call to 
```php
    User::where('first_name', 'john')->first()
```


### License ###
---

This package is open source software, available under the MIT license. See [LICENSE](LICENSE) for more information.