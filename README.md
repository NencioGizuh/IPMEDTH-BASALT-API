<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Passport

Om Laravel passport gebruiken moeten we een aantal stappen ondernemen. In de Dockerfile wordt het volgende commando gedaan

`composer require laravel/passport`

Dit hoef je dus zelf niet te doen. Hieronder een stappenlijstje om ernaast te houden
Ga de php-fpm container in en doe de commando's:

1. Migrate de database
   `php /var/www/artisan migrate`
   Als het goed is zie je de volgende zaken

```
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table (0.07 seconds)
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table (0.05 seconds)
Migrating: 2016_06_01_000001_create_oauth_auth_codes_table
Migrated:  2016_06_01_000001_create_oauth_auth_codes_table (0.08 seconds)
Migrating: 2016_06_01_000002_create_oauth_access_tokens_table
Migrated:  2016_06_01_000002_create_oauth_access_tokens_table (0.06 seconds)
Migrating: 2016_06_01_000003_create_oauth_refresh_tokens_table
Migrated:  2016_06_01_000003_create_oauth_refresh_tokens_table (0.07 seconds)
Migrating: 2016_06_01_000004_create_oauth_clients_table
Migrated:  2016_06_01_000004_create_oauth_clients_table (0.04 seconds)
Migrating: 2016_06_01_000005_create_oauth_personal_access_clients_table
Migrated:  2016_06_01_000005_create_oauth_personal_access_clients_table (0.03 seconds)
Migrating: 2019_08_19_000000_create_failed_jobs_table
Migrated:  2019_08_19_000000_create_failed_jobs_table (0.02 seconds)
```

2. Aanmaken van een passport grant client
   `php artisan passport:client --password`

Bij deze optie druk op enter

```
What should we name the password grant client? [Laravel Password Grant Client]:
```

Ook bij deze optie druk op enter

```
Which user provider should this client use to retrieve users? [users]:
  [0] users
```

Hieruit komt het volgende. Een belangrijk punt is dat dit de Client ID `1` is anders gaat alles niet werken

```
Password grant client created successfully.
Client ID: 1
Client secret: wFD1ilPLOGrPUZWGFcQ4UIECYnKl2RUunNYqf3jd
```

Je kan checken in je database of de client is aangemaakt

```
mysql> select * from oauth_clients;
+----+---------+-------------------------------+------------------------------------------+----------+------------------+------------------------+-----------------+---------+---------------------+---------------------+
| id | user_id | name                          | secret                                   | provider | redirect         | personal_access_client | password_client | revoked | created_at          | updated_at          |
+----+---------+-------------------------------+------------------------------------------+----------+------------------+------------------------+-----------------+---------+---------------------+---------------------+
|  1 |    NULL | Laravel Password Grant Client | IphH944TUQ12UFp9VgzQCk0WmDT8QkJakqVn7f1s | users    | http://localhost |                      0 |               1 |       0 | 2020-12-10 11:39:24 | 2020-12-10 11:39:24 |
+----+---------+-------------------------------+------------------------------------------+----------+------------------+------------------------+-----------------+---------+---------------------+---------------------+
1 row in set (0.01 sec)
```

Nu heb je alles aangemaakt en kun je via Postman testen of je API-requests kunt doen

## API-requests

Je kan gebruik maken van

-   Postman -> https://www.postman.com/
-   Insomnia -> https://insomnia.rest/

# Registreren

Type: POST\
URL: http://localhost:8000/api/register

Headers:\
Accept: application/json

Body:\
name: [name_of_person]\
patient_number: [integer_value]\
email: [email-address]\
password: [password]\
password_confirmation: [password]\
age: [integer_value]\
height: [integer_value]

Response:

```
{
    "name": "name_of_person",
    "patient_number": "integer_value",
    "email": "email_address",
    "age": "integer_value",
    "height": "integer_value",
    "updated_at": "2020-12-10T11:54:39.000000Z",
    "created_at": "2020-12-10T11:54:39.000000Z",
    "id": 1
}
```

# Inloggen

Type: POST\
URL: http://localhost:8000/api/login

Headers:\
Accept: application/json

Body:\
username: [email]\
password: [password]

Response

```
{
    "token_type": "Bearer",
    "expires_in": 31536000,
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiODljZGY5YTY1YWJiYjkwODJjM2FiMzQ5ZjljODE1ZmRkN2RiNTVmMGFlNGZiYjI2OTkxNDlmZWNlYTBjMmQ4MmJhOGJmY2U3MGU3OWJhMGMiLCJpYXQiOjE2MDc2MDEzOTMsIm5iZiI6MTYwNzYwMTM5MywiZXhwIjoxNjM5MTM3MzkyLCJzdWIiOiIxIiwic2NvcGVzIjpbIioiXX0.PcCLl5rrD9dFs8ODRb3UBKd2IIQLagX5YYOXzbppCUBuopA9VxfTtfh5STEt7Xdr6x51tnrfOyKHIsxcZYMJwLecrZu_c1D_PDjjBYEQkU6KAzJJTrUoRd0jVzPXr4wVROSc2JlxkQ4V7Tyyz1LZnGIxKhAB3CfR9Nr-mc00o6yeKA28Axtxziv1Ok5R6lD7UctFNYDIrZJua5yXD3PXMptLAPc3YoiaMA0RtbZVy_3H41XWahTmC0Dc0HXoutE5F3kIaI2aFF6GT-9Ql9ZqeACeMl-kV1Hk8l5HeHsQNjKoPc_2i1FieIfQ8_fvNihUa7qzKW1zG-NunPB-5i07kSbyy96IvdATcivPxxA3WGcmPIk6130rKI0QxLhv3PWodoUruvjnnvi3B6CgDDzjC2nz7xtW5OekNLq2aD5bhYuZEgdsb_E4sMgKTPQOOwp-LfEq2mcrf-lv4Xc5P4CiZwZvXhLPT3_4VDqa3ZysYwKxVaI1nbZiAH0Wn9j1Uhi27gTuLfncbyNnMo7eKSb-Rw96LZ8BiM9T6p7-xiPsZ-ZzCp6w1PEflDEkCtsHJBQMqpU6398w3_cco4qNInyyH-ixuCDzClS2ocOQP1ZDLe8IiHm3rI85_Dg9FTm5We6XydLjEJQ-2EpKU_XDI1E3sePv7lNstKsrNqy_INKvinQ",
    "refresh_token": "def502007769c4acabd08898857702037deaf632ae122801c23b6dc4fb61380b557d98eb544ad753124fedecfb93140f745a2d2bdf32ba9613b9d5ce386bd5a45e67cedbda9a533af2ab8e2e72c7d2fbd26684afbfc1120b2febaed8ff9c7b69195b2332367c741dbfd29e0d42adaad864e608094dc739c764543ff2e4c55de189d6e8e1ed087de6964d92d4d49e230b8c39bb378823bd15ce499c5ef2b3df73fb78329033ae3009db6ee4fdd3f023ebcf4256e9fd28d086246bb5cdb88594b4f271398e68b3d0b75a1200b9de7010adae5e1399769cbcdd9499c32b338b8de16d359ecfabcc39ae746684e694f62039a1b22cfe83f64e41791679f54f79241d051d0704d5e9a658b625177320ab0493bd986802287830f215d4a8c032e24a76c124b78b8c57b7d4901675f8cd82415391a114ffa7d990f152bb5d7b88762c52f092707c1680e66c61419779f2efe39551ae99dc08fbc21139b9ec4a8ecd7e280ec4d6b8"
}
```

# Uitloggen

Type: GET\
URL: http://localhost:8000/api/logout

Headers:\
Accept: application/json\
Bearer: bearer [access_token]

Response:

```
Logged out succesfully
```

# Data vergaren van gebruikers

Type: POST\
URL: http://localhost:8000/api/user

Headers:\
Accept: application/json\
Bearer: bearer [access_token]

Response:

```
{
    "id": 1,
    "name": "name_of_person",
    "patient_number": 7777777,
    "email": "email_address",
    "email_verified_at": null,
    "age": 77,
    "height": 200,
    "created_at": "2020-12-10T11:54:39.000000Z",
    "updated_at": "2020-12-10T11:54:39.000000Z"
}
```

# Peakflow ophalen van user

Type: GET\
URL: http://localhost:8000/api/getpeakflowuser

Headers:\
Authorization: Bearer [access_token]

Response:

```
[
    {
        "id": 1,
        "date": "2020-12-01",
        "time": "12:38:08",
        "measurement_one": 450,
        "measurement_two": 476,
        "measurement_three": 463,
        "taken_medicines": 0,
        "explanation": "Het gaat prima vandaag.",
        "created_at": "2020-12-10T17:11:55.000000Z",
        "updated_at": "2020-12-10T17:11:55.000000Z",
        "user_id": 1
    }
]
```

# Nieuwe peakflow aanmaken

Type: POST\
URL: http://localhost:8000/api/createpeakflow

Headers:\
Content-type: application/json\
Authorization: Bearer [access_token]

Body:\
date: [date]\
time: [time]\
measurement_one: [integer]\
measurement_two: [integer]\
measurement_three: [integer]\
taken_medicines: [boolean]\
explanation: [string]

Response:

```
{
    "user_id": 2,
    "date": "2020-12-01",
    "time": "12:38:08",
    "measurement_one": 450,
    "measurement_two": 476,
    "measurement_three": 463,
    "taken_medicines": false,
    "explanation": "Het gaat prima vandaag.",
    "updated_at": "2020-12-11T12:13:24.000000Z",
    "created_at": "2020-12-11T12:13:24.000000Z",
    "id": 4
}
```

# Peakflow updaten

Type: PUT\
URL: http://localhost:8000/api/updatepeakflow/{peakflow_id}

Headers:\
Content-type: application/json\
Authorization: Bearer [access_token]

Body (optional):\
date: [date]\
time: [time]\
measurement_one: [integer]\
measurement_two: [integer]\
measurement_three: [integer]\
taken_medicines: [boolean]\
explanation: [string]

Response:

```
{
    "user_id": 2,
    "date": "2020-12-01",
    "time": "12:38:08",
    "measurement_one": 450,
    "measurement_two": 476,
    "measurement_three": 463,
    "taken_medicines": false,
    "explanation": "Het gaat prima vandaag.",
    "updated_at": "2020-12-11T12:13:24.000000Z",
    "created_at": "2020-12-11T12:13:24.000000Z",
    "id": 4
}
```

# Peakflow verwijderen

Type: DELETE\
URL: http://localhost:8000/api/deletepeakflow/{peakflow_id}

Headers:\
Authorization: Bearer [access_token]

# Actionplan ophalen van user

Type: GET\
URL: http://localhost:8000/api/getactionplanuser

Headers:\
Authorization: Bearer [access_token]

Response:

```
[
    {
        "id": 3,
        "user_id": 2,
        "zone_green_peakflow_before_medicines": 400,
        "zone_green_peakflow_after_medicines": 400,
        "zone_green_explanation": null,
        "zone_yellow_peakflow_below": 3423,
        "zone_yellow_peakflow_above": 234,
        "zone_yellow_medicines": null,
        "zone_yellow_explanation": null,
        "phonenumber_gp": "0612345678",
        "phonenumber_lung_specialist": "0612345678",
        "zone_orange_explanation": null,
        "zone_red_peakflow": 200,
        "zone_red_medicines": null,
        "zone_red_explanation": null,
        "created_at": "2020-12-11T15:42:03.000000Z",
        "updated_at": "2020-12-11T15:42:16.000000Z"
    }
]
```

# Nieuw actionplan aanmaken

Type: POST\
URL: http://localhost:8000/api/createactionplan

Headers:\
Content-type: application/json\
Authorization: Bearer [access_token]

Body:\
zone_green_peakflow_before_medicines: [integer|required]\
zone_green_peakflow_after_medicines: [integer|required]\
zone_green_explanation: [string]\
zone_yellow_peakflow_below: [integer|required]\
zone_yellow_peakflow_above: [integer|required]\
zone_yellow_medicines: [string]\
zone_yellow_explanation: [string]\
phonenumber_gp: [string]\
phonenumber_lung_specialist: [string]\
zone_orange_explanation: [string]\
zone_red_peakflow: [integer|required]\
zone_red_medicines: [string]\
zone_red_explanation: [string]

Response:

```
{
    "user_id": 2,
    "zone_green_peakflow_before_medicines": 400,
    "zone_green_peakflow_after_medicines": 400,
    "zone_green_explanation": null,
    "zone_yellow_peakflow_below": 3423,
    "zone_yellow_peakflow_above": 234,
    "zone_yellow_medicines": null,
    "zone_yellow_explanation": null,
    "phonenumber_gp": "0612345678",
    "phonenumber_lung_specialist": "0687654321",
    "zone_orange_explanation": null,
    "zone_red_peakflow": 200,
    "zone_red_medicines": null,
    "zone_red_explanation": null,
    "updated_at": "2020-12-11T15:42:03.000000Z",
    "created_at": "2020-12-11T15:42:03.000000Z",
    "id": 3
}
```

# Actionplan updaten

Type: PUT\
URL: http://localhost:8000/api/updateactionplan

Headers:\
Content-type: application/json\
Authorization: Bearer [access_token]

Body (optional):\
zone_green_peakflow_before_medicines: [integer]\
zone_green_peakflow_after_medicines: [integer]\
zone_green_explanation: [string]\
zone_yellow_peakflow_below: [integer]\
zone_yellow_peakflow_above: [integer]\
zone_yellow_medicines: [string]\
zone_yellow_explanation: [string]\
phonenumber_gp: [string]\
phonenumber_lung_specialist: [string]\
zone_orange_explanation: [string]\
zone_red_peakflow: [integer]\
zone_red_medicines: [string]\
zone_red_explanation: [string]

Response:

```
{
    "id": 3,
    "user_id": 2,
    "zone_green_peakflow_before_medicines": 400,
    "zone_green_peakflow_after_medicines": 400,
    "zone_green_explanation": null,
    "zone_yellow_peakflow_below": 3423,
    "zone_yellow_peakflow_above": 234,
    "zone_yellow_medicines": null,
    "zone_yellow_explanation": null,
    "phonenumber_gp": "0612345678",
    "phonenumber_lung_specialist": "0612345678",
    "zone_orange_explanation": null,
    "zone_red_peakflow": 200,
    "zone_red_medicines": null,
    "zone_red_explanation": null,
    "created_at": "2020-12-11T15:42:03.000000Z",
    "updated_at": "2020-12-11T15:42:16.000000Z"
}
```

# Actionplan verwijderen

Type: DELETE\
URL: http://localhost:8000/api/deleteactionplan

Headers:\
Authorization: Bearer [access_token]

# BreathingExercises ophalen van user

Type: GET\
URL: http://localhost:8000/api/getbreathingexercisesuser

Headers:\
Authorization: Bearer [access_token]

Response:

```
[
    {
        "id": 6,
        "user_id": 1,
        "date": "2020-12-13",
        "cp_measurement_one": null,
        "cp_measurement_two": null,
        "interval": 1,
        "buteyko": 0,
        "papworth": 1,
        "middenrifspier": 0,
        "wim_hof": 0,
        "created_at": "2020-12-14T09:18:03.000000Z",
        "updated_at": "2020-12-14T09:23:38.000000Z"
    }
]
```

# Nieuwe breathing exercise aanmaken

Type: POST\
URL: http://localhost:8000/api/createbreathingexercise

Headers:\
Content-type: application/json\
Authorization: Bearer [access_token]

Body:\
date: [date|required]\
cp_measurement_one: [integer]\
cp_measurement_two: [integer]\
interval: [boolean]\
buteyko: [boolean]\
papworth: [boolean]\
middenrifspier: [boolean]\
wim_hof: [boolean]

Response:

```
{
    "user_id": 1,
    "date": "2020-12-14",
    "cp_measurement_one": null,
    "cp_measurement_two": null,
    "interval": true,
    "buteyko": false,
    "papworth": false,
    "middenrifspier": false,
    "wim_hof": false,
    "updated_at": "2020-12-14T09:44:54.000000Z",
    "created_at": "2020-12-14T09:44:54.000000Z",
    "id": 8
}
```

# Breathing exercise updaten

Type: PUT\
URL: http://localhost:8000/api/updatebreathingexercise/{id}

Headers:\
Content-type: application/json\
Authorization: Bearer [access_token]

Body (optional):\
date: [date]\
cp_measurement_one: [integer]\
cp_measurement_two: [integer]\
interval: [boolean]\
buteyko: [boolean]\
papworth: [boolean]\
middenrifspier: [boolean]\
wim_hof: [boolean]

Response:

```
{
    "id": 7,
    "user_id": 1,
    "date": "2020-12-13",
    "cp_measurement_one": 12,
    "cp_measurement_two": null,
    "interval": 1,
    "buteyko": 0,
    "papworth": 1,
    "middenrifspier": 0,
    "wim_hof": 0,
    "created_at": "2020-12-14T09:43:26.000000Z",
    "updated_at": "2020-12-14T09:44:28.000000Z"
}
```

# Breathing exercise verwijderen

Type: DELETE\
URL: http://localhost:8000/api/deletebreathingexercise/{id}

Headers:\
Authorization: Bearer [access_token]
