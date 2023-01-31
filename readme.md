Laravel Mail Catcher Driver
This package include a new livemail driver which will catch all the sent emails and save it to the database. It then exposes a route /livemail/inbox which you can visit to preview all the mails.

## Installation

To install run the following command in your terminal:

```bash
composer require linksderisar/livemail --dev
```

Then run the migration
```
php artisan migrate
```

Finally, change `MAIL_MAILER` to `livemail` in your `.env` file:

```
MAIL_MAILER=livemail
```
![image](https://user-images.githubusercontent.com/32777386/215849047-51228aa6-5919-4e8a-ba88-bc5d2ad12baf.png)


### TODO

1. Add polling
2. Styling
3. Add attachments
4. Add email source
5. Add delete
6. Add cleanup (delete all after x days?)
