## Laravel REST API Mailer

Send email through API request/response using the laravel Passport API and basic SMTP configuration.

### Getting Started
To setup the following application please run the following command on your command line:

1. Rename `.env.sample` file to `.env`

2. Create DB `mail_test` and run the command below:
```php
composer install
```
```php
php artisan passport:install
```
```php
php artisan passport:keys
```
```php
php artisan migrate
```
```php
php artisan serve
```


### Test Request
Test Guides for the following application:

1. Send the following json using postman on http://127.0.0.1:8000/api/send the method is [POST] for the json format
```

POST http://127.0.0.1:8000/api/send

```

```json
{
    "name":"",
    "email":"testgmailer@mailinaitor.com",
    "subject": "Laravel Test Mail",
    "message":"This is a sample test mail message..",
    "attachment": ""
}
```

`Note:` Attachment json should be a base64 string

2. Open Horizon using `php artisan horizon` make sure the Redis is open.