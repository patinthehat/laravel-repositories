## Laravel Repositories ##
---

This package provides a basic Repository pattern implementation for use with Laravel 5+.

###Installation
---

This package may be installed with composer:
  `composer require patinthehat/laravel-repositories`


###Usage
---

Extend the `Repository` class and define its `$model` property to create a repository for that model:
```php
use Permafrost\Repository;

class UserRepository extends Repository
{
    public static $model = 'App\\User';
}
```

The repository can then be used:

```php
  $user = UserRepository::findByFirstName('john');
```

###Dynamic Find Methods
---

The `Repository` class allows for dynamic `findByN` static method calls, which will search the repository model's field N for its first argument.
For example, `UserRepository::findByFirstName('john')` results in a call to `User::where('first_name', 'john')->first()`.


###License
---

This package is open source software, available under the MIT license. See [LICENSE](LICENSE) for more information.