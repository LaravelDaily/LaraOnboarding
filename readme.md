Laravel package for sending scheduled emails to registered users, on their 2th, 4th or Xth day after registration. Typical usage is "onboarding" emails during free trial period or first days of using your application.

![LaraOnboarding screenshot](https://laraveldaily.com/wp-content/uploads/2018/11/laravel-laraonboarding-demo.png)

---

## Installation  
1. `composer require laraveldaily/LaraOnboarding`
2. `php artisan vendor:publish` - will publish configuration and view files
3. `php artisan migrate` - it will add `unsubscribed_at` field to your `users` table  
4. Fill your `config/onboarding.php` configuration file.

---

## Usage and configuration

Once a day run a command `php artisan onboarding:send` which will send the emails to all users registered X days ago, according to config file.

By default, your file `config/onboarding.php` will contain two emails to send:

```
/**
 * Days after the user registration, email subject and email template for the specified case
 */
return [
    [
        'template' => 'laraveldaily.onboarding.emails.example-mail',
        'days' => 2,
        'subject' => 'Second day email',
    ],
    [
        'template' => 'laraveldaily.onboarding.emails.example-mail',
        'days' => 4,
        'subject' => 'Fourth day email',
    ],
    // add more in the same format...
];

```

This configuration means that when running `php artisan onboarding:send`, system will send an email with template `example-mail` and subject 'Second day email' to users who registered 2 days ago (by `users.created_at`), and also `example-mail` to users who registered 4 days ago.

So change these according to your needs.

Email templates can be found in the folder `resources/views/laraveldaily/onboarding/emails`.

---

## License
The MIT License (MIT). Please see [License File](license.md) for more information.

---

## More from our LaravelDaily Team

- Check out our adminpanel generator [QuickAdminPanel](https://quickadminpanel.com) 
- Read our [Blog with Laravel Tutorials](https://laraveldaily.com)
- FREE E-book: [50 Laravel Quick Tips (and counting)](https://laraveldaily.com/free-e-book-40-laravel-quick-tips-and-counting/)
- Subscribe to our [YouTube channel Laravel Business](https://www.youtube.com/channel/UCTuplgOBi6tJIlesIboymGA)
- Enroll in our [Laravel Online Courses](https://laraveldaily.teachable.com/)
