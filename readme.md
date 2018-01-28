Laravel package for sending scheduled emails to registered application users

---

## Installation  
1. `composer require laraveldaily/LaraOnboarding`
2. `php artisan vendor:publish` - will publish configuration and view files
3. `php artisan migrate` - it will add `unsubscribed_at` field to your `users` table  
4. Fill your `config/onboarding.php` configuration file.

---

## License
The MIT License (MIT). Please see [License File](license.md) for more information.