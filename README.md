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

# Triggers ophalen van user

Type: GET\
URL: http://localhost:8000/api/gettriggersuser

Headers:\
Authorization: Bearer [access_token]

Response:

```
{
    "id": 1,
    "user_id": 1,
    "tobacco_smoke": 0,
    "dust_mites": 1,
    "air_pollution": 0,
    "pets": 1,
    "fungi": 0,
    "fire_smoke": 1,
    "infections": 1,
    "effort": 0,
    "weather_conditions": 0,
    "hyperventilation": 1,
    "pollen": 0,
    "created_at": "2020-12-14T12:45:43.000000Z",
    "updated_at": "2020-12-14T12:46:07.000000Z"
}
```

# Nieuwe triggers aanmaken

Type: POST\
URL: http://localhost:8000/api/createtriggers

Headers:\
Content-type: application/json\
Authorization: Bearer [access_token]

Body:\
tobacco_smoke: [boolean]\
dust_mites: [boolean]\
air_pollution: [boolean]\
pets: [boolean]\
fungi: [boolean]\
fire_smoke: [boolean]\
infections: [boolean]\
effort: [boolean]\
weather_conditions: [boolean]\
hyperventilation: [boolean]\
pollen: [boolean]

Response:

```
{
    "id": 2,
    "user_id": 1,
    "tobacco_smoke": true,
    "dust_mites": true,
    "air_pollution": false,
    "pets": true,
    "fungi": false,
    "fire_smoke": true,
    "infections": true,
    "effort": false,
    "weather_conditions": false,
    "hyperventilation": true,
    "pollen": false,
    "created_at": "2020-12-14T12:49:15.000000Z",
    "updated_at": "2020-12-14T12:55:38.000000Z"
}
```

# Breathing exercise updaten

Type: PUT\
URL: http://localhost:8000/api/updatetriggers

Headers:\
Content-type: application/json\
Authorization: Bearer [access_token]

Body (optional):\
tobacco_smoke: [boolean]\
dust_mites: [boolean]\
air_pollution: [boolean]\
pets: [boolean]\
fungi: [boolean]\
fire_smoke: [boolean]\
infections: [boolean]\
effort: [boolean]\
weather_conditions: [boolean]\
hyperventilation: [boolean]\
pollen: [boolean]

Response:

```
{
    "id": 1,
    "user_id": 1,
    "tobacco_smoke": 0,
    "dust_mites": true,
    "air_pollution": false,
    "pets": true,
    "fungi": false,
    "fire_smoke": true,
    "infections": true,
    "effort": false,
    "weather_conditions": false,
    "hyperventilation": true,
    "pollen": true,
    "created_at": "2020-12-14T12:45:43.000000Z",
    "updated_at": "2020-12-14T12:47:45.000000Z"
}
```

# Triggers verwijderen

Type: DELETE\
URL: http://localhost:8000/api/deletetriggers

Headers:\
Authorization: Bearer [access_token]

# Alle medicaties ophalen

Type: GET\
URL: http://localhost:8000/api/getmedication

Response:

```
[
    {
        "id": 1,
        "name": "Salbutamol",
        "type": "Luchtwegverwijders"
    },
    {
        "id": 2,
        "name": "Terbutaline",
        "type": "Luchtwegverwijders"
    },
    {
        "id": 3,
        "name": "Ipratropium",
        "type": "Luchtwegverwijders"
    },
    {
        "id": 4,
        "name": "Formoterol",
        "type": "Luchtwegverwijders"
    },
    {
        "id": 5,
        "name": "Indacaterol",
        "type": "Luchtwegverwijders"
    },
    {
        "id": 6,
        "name": "Salmeterol",
        "type": "Luchtwegverwijders"
    },
    {
        "id": 7,
        "name": "Olodaterol",
        "type": "Luchtwegverwijders"
    },
    {
        "id": 8,
        "name": "Tiotropium",
        "type": "Luchtwegverwijders"
    },
    {
        "id": 9,
        "name": "Glycopyrronium",
        "type": "Luchtwegverwijders"
    },
    {
        "id": 10,
        "name": "Aclidinium",
        "type": "Luchtwegverwijders"
    },
    {
        "id": 11,
        "name": "Umeclidinium",
        "type": "Luchtwegverwijders"
    },
    {
        "id": 12,
        "name": "Beclomethason",
        "type": "Luchtwegbeschermers"
    },
    {
        "id": 13,
        "name": "Budesonide",
        "type": "Luchtwegbeschermers"
    },
    {
        "id": 14,
        "name": "Ciclesonide",
        "type": "Luchtwegbeschermers"
    },
    {
        "id": 15,
        "name": "Fluticasonpropionaat",
        "type": "Luchtwegbeschermers"
    },
    {
        "id": 16,
        "name": "Corticosteroid Neusspray",
        "type": "Neusspray"
    }
]
```

# Nieuwe medicijnen aanmaken

Type: POST\
URL: http://localhost:8000/api/createmedication

Headers:\
Content-type: application/json

Body:\
name: [string]\
type: [string]

Response:

```
{
    "name": "testmedicijn",
    "type": "testen",
    "id": 18
}
```

# Medicijn updaten (by id)

Type: PUT\
URL: http://localhost:8000/api/updatemedication/{id}

Headers:\
Content-type: application/json

Body (optional):\
name: [string]\
type: [string]

Response:

```
{
    "id": 18,
    "name": "NieuweNaam",
    "type": "testen"
}
```

# Medicijn verwijderen (by id)

Type: DELETE\
URL: http://localhost:8000/api/deletemedication/{id}

# Alle medicaties van user ophalen

Type: GET\
URL: http://localhost:8000/api/getmedicationsuser

Response:

```
[
    {
        "id": 1,
        "user_id": 1,
        "time": "12:00:00",
        "medicine_id": 1,
        "medication": {
            "id": 1,
            "name": "Salbutamol",
            "type": "Luchtwegverwijders"
        }
    },
    {
        "id": 2,
        "user_id": 1,
        "time": "12:00:00",
        "medicine_id": 6,
        "medication": {
            "id": 6,
            "name": "Salmeterol",
            "type": "Luchtwegverwijders"
        }
    },
    {
        "id": 3,
        "user_id": 1,
        "time": "12:00:00",
        "medicine_id": 10,
        "medication": {
            "id": 10,
            "name": "Aclidinium",
            "type": "Luchtwegverwijders"
        }
    }
]
```

# Nieuwe medicijn voor user aanmaken

Type: POST\
URL: http://localhost:8000/api/createmedicationsuser

Headers:\
Content-type: application/json\
Authorization: Bearer [access_token]

Body:\
time: [time]\
medicine_id: [number]

Response:

```
{
    "user_id": 1,
    "time": "12:00",
    "medicine_id": 16,
    "id": 10
}
```

# Medicijn user updaten (by id)

Type: PUT\
URL: http://localhost:8000/api/updatemedicationsuser/{id}

Headers:\
Content-type: application/json\
Authorization: Bearer [access_token]

Body (optional):\
time: [time]\
medicine_id: [number]

Response:

```
{
    "id": 3,
    "user_id": 1,
    "time": "12:00:00",
    "medicine_id": 4
}
```

# Medicijn user verwijderen (by id)

Type: DELETE\
URL: http://localhost:8000/api/deletemedicationsuser/{id}

Headers:\
Authorization: Bearer [access_token]

# Alle ingenomen medicaties van user ophalen

Type: GET\
URL: http://localhost:8000/api/getmedicationsusertaken

Response:

```
[
    {
        "id": 2,
        "user_id": 1,
        "date": "2020-12-21",
        "time": "18:00:00",
        "medicine_id": 3,
        "medication": {
            "id": 3,
            "name": "Ipratropium",
            "type": "Luchtwegverwijders"
        }
    }
]
```

# Nieuwe medicijn voor user registreren

Type: POST\
URL: http://localhost:8000/api/createmedicationsusertaken

Headers:\
Content-type: application/json\
Authorization: Bearer [access_token]

Body:\
time: [time]\
date: [date]\
medicine_id: [number]

Response:

```
{
    "user_id": 1,
    "date": "2020-12-21",
    "time": "18:00",
    "medicine_id": 3,
    "id": 2
}
```

# Geregistreerde medicijn user updaten (by id)

Type: PUT\
URL: http://localhost:8000/api/updatemedicationsusertaken/{id}

Headers:\
Content-type: application/json\
Authorization: Bearer [access_token]

Body (optional):\
time: [time]\
date: [date]\
medicine_id: [number]

Response:

```
{
    "id": 2,
    "user_id": 1,
    "date": "2020-12-20",
    "time": "18:00:00",
    "medicine_id": 3
}
```

# Geregistreerde medicijn user verwijderen (by id)

Type: DELETE\
URL: http://localhost:8000/api/deletemedicationsusertaken/{id}

Headers:\
Authorization: Bearer [access_token]

# Inhalators ophalen op basis van id
Type: GET
URL: http://localhost:8000/api/choseninhalators

Params:

values: values: [comma_separated_list] integer

Response:

```
[
    {
        "id": 4,
        "inhalatorName": "Seebri Breezhaler",
        "fabrikant": "Novartis Pharma bv",
        "afbeelding": "/inhalators/Seebri Breezhaler.png",
        "gebruikMedicijn": "glycopyrronium",
        "color": "white",
        "state": 0
    },
    {
        "id": 7,
        "inhalatorName": "Beclometason inhalatiepoeder Cyclocaps",
        "fabrikant": "Teva Pharma",
        "afbeelding": "/inhalators/Beclometason inhalatiepoeder Cyclocaps.png",
        "gebruikMedicijn": "beclometason",
        "color": "white",
        "state": 0
    },
    {
        "id": 22,
        "inhalatorName": "Berodual dosisaerosol",
        "fabrikant": "BoehringerIngelheim",
        "afbeelding": "/inhalators/Berodual dosisaerosol.png",
        "gebruikMedicijn": "fenoterol",
        "color": "white",
        "state": 0
    },
    {
        "id": 23,
        "inhalatorName": "Berodual dosisaerosol",
        "fabrikant": "BoehringerIngelheim",
        "afbeelding": "/inhalators/Berodual dosisaerosol.png",
        "gebruikMedicijn": "ipratropium",
        "color": "white",
        "state": 0
    }
]
```

# Inhalators ophalen op basis van medicatie

Type: GET
URL: http://localhost:8000/api/inhalatorinformation

Params:
values: [comma_separated_list] string

Response:

```
[
    {
        "id": 1,
        "inhalatorName": "Airomir dosisaerosol autohaler",
        "fabrikant": "Teva Pharma",
        "afbeelding": "/inhalators/Airomir dosisaerosol autohaler.png",
        "gebruikMedicijn": "salbutamol",
        "color": "white",
        "state": 0
    },
    {
        "id": 3,
        "inhalatorName": "Onbrez inhalatiepoeder Breezhaler",
        "fabrikant": "Novartis Pharma bv",
        "afbeelding": "/inhalators/Onbrez inhalatiepoeder Breezhaler.png",
        "gebruikMedicijn": "indacaterol",
        "color": "white",
        "state": 0
    },
    {
        "id": 5,
        "inhalatorName": "Ultibro Breezhaler",
        "fabrikant": "Novartis Pharma bv",
        "afbeelding": "/inhalators/Ultibro Breezhaler.png",
        "gebruikMedicijn": "indacaterol",
        "color": "white",
        "state": 0
    },
    {
        "id": 8,
        "inhalatorName": "Budesonide inhalatiepoeder Cyclohaler",
        "fabrikant": "Teva Pharma",
        "afbeelding": "/inhalators/Budesonide inhalatiepoeder Cyclohaler.png",
        "gebruikMedicijn": "budesonide",
        "color": "white",
        "state": 0
    },
    {
        "id": 9,
        "inhalatorName": "Formoterol inhalatiepoeder Cyclohaler",
        "fabrikant": "Teva Pharma",
        "afbeelding": "/inhalators/Formoterol inhalatiepoeder Cyclohaler.png",
        "gebruikMedicijn": "formoterol",
        "color": "white",
        "state": 0
    },
    {
        "id": 10,
        "inhalatorName": "Ipratropium inhalatiepoeder Cyclohaler",
        "fabrikant": "Teva Pharma",
        "afbeelding": "/inhalators/Ipratropium inhalatiepoeder Cyclohaler.png",
        "gebruikMedicijn": "Ipratropium",
        "color": "white",
        "state": 0
    },
    {
        "id": 11,
        "inhalatorName": "Salbutamol cyclohaler inhalatiepoeder",
        "fabrikant": "Teva Pharma",
        "afbeelding": "/inhalators/Salbutamol cyclohaler inhalatiepoeder.png",
        "gebruikMedicijn": "salbutamol",
        "color": "white",
        "state": 0
    },
    {
        "id": 12,
        "inhalatorName": "Flixotide inhalatiepoeder Diskus",
        "fabrikant": "GlaxoSmithKline",
        "afbeelding": "/inhalators/Flixotide inhalatiepoeder Diskus.png",
        "gebruikMedicijn": "fluticasonpropionaat",
        "color": "white",
        "state": 0
    },
    {
        "id": 14,
        "inhalatorName": "Seretide inhalatiepoeder Diskus",
        "fabrikant": "GlaxoSmithKline",
        "afbeelding": "/inhalators/Seretide inhalatiepoeder Diskus.png",
        "gebruikMedicijn": "fluticasonpropionaat",
        "color": "white",
        "state": 0
    },
    {
        "id": 16,
        "inhalatorName": "Ventolin inhalatiepoeder Diskus",
        "fabrikant": "GlaxoSmithKline",
        "afbeelding": "/inhalators/Ventolin inhalatiepoeder Diskus.png",
        "gebruikMedicijn": "salbutamol",
        "color": "white",
        "state": 0
    },
    {
        "id": 17,
        "inhalatorName": "Airomir dosisaerosol",
        "fabrikant": "Teva Pharma",
        "afbeelding": "/inhalators/Airomir dosisaerosol.png",
        "gebruikMedicijn": "salbutamol",
        "color": "white",
        "state": 0
    },
    {
        "id": 18,
        "inhalatorName": "Alvesco dosisaerosol inhalator",
        "fabrikant": "Covis Pharma Europe B.V.",
        "afbeelding": "/inhalators/Alvesco dosisaerosol inhalator.png",
        "gebruikMedicijn": "ciclesonide",
        "color": "white",
        "state": 0
    },
    {
        "id": 19,
        "inhalatorName": "Atimos dosisaerosol",
        "fabrikant": "Chiesi Pharmaceuticals BV",
        "afbeelding": "/inhalators/Atimos dosisaerosol.png",
        "gebruikMedicijn": "formoterol",
        "color": "white",
        "state": 0
    },
    {
        "id": 20,
        "inhalatorName": "Atrovent dosisaerosol",
        "fabrikant": "BoehringerIngelheim",
        "afbeelding": "/inhalators/Atrovent dosisaerosol.png",
        "gebruikMedicijn": "ipratropium",
        "color": "white",
        "state": 0
    },
    {
        "id": 23,
        "inhalatorName": "Berodual dosisaerosol",
        "fabrikant": "BoehringerIngelheim",
        "afbeelding": "/inhalators/Berodual dosisaerosol.png",
        "gebruikMedicijn": "ipratropium",
        "color": "white",
        "state": 0
    },
    {
        "id": 24,
        "inhalatorName": "Bevespi Aerosphere",
        "fabrikant": "AstraZeneca",
        "afbeelding": "/inhalators/Bevespi Aerosphere.png",
        "gebruikMedicijn": "formoterol",
        "color": "white",
        "state": 0
    },
    {
        "id": 26,
        "inhalatorName": "Budesonide dosisaerosol",
        "fabrikant": "Mylan",
        "afbeelding": "/inhalators/Budesonide dosisaerosol Mylan.png",
        "gebruikMedicijn": "budesonide",
        "color": "white",
        "state": 0
    },
    {
        "id": 27,
        "inhalatorName": "Flixotide dosisaerosol",
        "fabrikant": "GlaxoSmithKline",
        "afbeelding": "/inhalators/Flixotide dosisaerosol.png",
        "gebruikMedicijn": "fluticasonpropionaat",
        "color": "white",
        "state": 0
    },
    {
        "id": 28,
        "inhalatorName": "Flutiform dosisaerosol",
        "fabrikant": "Mundipharma",
        "afbeelding": "/inhalators/Flutiform dosisaerosol.png",
        "gebruikMedicijn": "formoterol",
        "color": "white",
        "state": 0
    },
    {
        "id": 29,
        "inhalatorName": "Flutiform dosisaerosol",
        "fabrikant": "Mundipharma",
        "afbeelding": "/inhalators/Flutiform dosisaerosol.png",
        "gebruikMedicijn": "fluticasonpropionaat",
        "color": "white",
        "state": 0
    },
    {
        "id": 30,
        "inhalatorName": "Foster dosisaerosol",
        "fabrikant": "Chiesi Pharmaceuticals BV",
        "afbeelding": "/inhalators/Foster dosisaerosol.png",
        "gebruikMedicijn": "formoterol",
        "color": "white",
        "state": 0
    },
    {
        "id": 31,
        "inhalatorName": "Foster dosisaerosol",
        "fabrikant": "Chiesi Pharmaceuticals BV",
        "afbeelding": "/inhalators/Foster dosisaerosol.png",
        "gebruikMedicijn": "beclomethason",
        "color": "white",
        "state": 0
    },
    {
        "id": 33,
        "inhalatorName": "Salbutamol dosisaerosol",
        "fabrikant": "Teva Pharma",
        "afbeelding": "/inhalators/Salbutamol dosisaerosol.png",
        "gebruikMedicijn": "salbutamol",
        "color": "white",
        "state": 0
    },
    {
        "id": 35,
        "inhalatorName": "Seretide dosisaerosol",
        "fabrikant": "GlaxoSmithKline",
        "afbeelding": "/inhalators/Seretide dosisaerosol.png",
        "gebruikMedicijn": "fluticasonpropionaat",
        "color": "white",
        "state": 0
    },
    {
        "id": 37,
        "inhalatorName": "Symbicort dosisaerosol",
        "fabrikant": "AstraZeneca",
        "afbeelding": "/inhalators/Symbicort dosisaerosol.png",
        "gebruikMedicijn": "budesonide",
        "color": "white",
        "state": 0
    },
    {
        "id": 38,
        "inhalatorName": "Symbicort dosisaerosol",
        "fabrikant": "AstraZeneca",
        "afbeelding": "/inhalators/Symbicort dosisaerosol.png",
        "gebruikMedicijn": "formoterol",
        "color": "white",
        "state": 0
    },
    {
        "id": 40,
        "inhalatorName": "Trimbow dosisaerosol",
        "fabrikant": "Chiesi",
        "afbeelding": "/inhalators/Trimbow dosisaerosol.png",
        "gebruikMedicijn": "formoterol",
        "color": "white",
        "state": 0
    },
    {
        "id": 42,
        "inhalatorName": "Ventolin dosisaerosol",
        "fabrikant": "GlaxoSmithKline",
        "afbeelding": "/inhalators/Ventolin dosisaerosol.png",
        "gebruikMedicijn": "salbutamol",
        "color": "white",
        "state": 0
    },
    {
        "id": 43,
        "inhalatorName": "Easyhaler met Budesonide",
        "fabrikant": "Orion Pharma Benelux",
        "afbeelding": "/inhalators/Easyhaler met Budesonide.png",
        "gebruikMedicijn": "budesonide",
        "color": "white",
        "state": 0
    },
    {
        "id": 44,
        "inhalatorName": "Easyhaler met combinatie Budesonide / Formoterol",
        "fabrikant": "Orion Pharma Benelux",
        "afbeelding": "/inhalators/Easyhaler met combinatie Budesonide a Formoterol.png",
        "gebruikMedicijn": "formoterol",
        "color": "white",
        "state": 0
    },
    {
        "id": 45,
        "inhalatorName": "Easyhaler met combinatie Budesonide / Formoterol",
        "fabrikant": "Orion Pharma Benelux",
        "afbeelding": "/inhalators/Easyhaler met combinatie Budesonide a Formoterol.png",
        "gebruikMedicijn": "budesonide",
        "color": "white",
        "state": 0
    },
    {
        "id": 46,
        "inhalatorName": "Easyhaler met Formoterol",
        "fabrikant": "Orion Pharma Benelux",
        "afbeelding": "/inhalators/Easyhaler met Formoterol.png",
        "gebruikMedicijn": "formoterol",
        "color": "white",
        "state": 0
    },
    {
        "id": 47,
        "inhalatorName": "Incruse Ellipta",
        "fabrikant": "GSK",
        "afbeelding": "/inhalators/Incruse Ellipta.png",
        "gebruikMedicijn": "umeclidinium",
        "color": "white",
        "state": 0
    },
    {
        "id": 51,
        "inhalatorName": "Spiriva inhalatiepoeder Handihaler",
        "fabrikant": "BoehringerIngelheim",
        "afbeelding": "/inhalators/Spiriva inhalatiepoeder Handihaler.png",
        "gebruikMedicijn": "tiotropium",
        "color": "white",
        "state": 0
    },
    {
        "id": 52,
        "inhalatorName": "Foster inhalatiepoeder Nexthaler",
        "fabrikant": "Chiesi Pharmaceuticals BV",
        "afbeelding": "/inhalators/Foster inhalatiepoeder Nexthaler.png",
        "gebruikMedicijn": "formoterol",
        "color": "white",
        "state": 0
    },
    {
        "id": 53,
        "inhalatorName": "Foster inhalatiepoeder Nexthaler",
        "fabrikant": "Chiesi Pharmaceuticals BV",
        "afbeelding": "/inhalators/Foster inhalatiepoeder Nexthaler.png",
        "gebruikMedicijn": "beclomethason",
        "color": "white",
        "state": 0
    },
    {
        "id": 54,
        "inhalatorName": "Budesonide inhalatiepoeder Novolizer",
        "fabrikant": "Mylan BV",
        "afbeelding": "/inhalators/Budesonide inhalatiepoeder Novolizer.png",
        "gebruikMedicijn": "budesonide",
        "color": "white",
        "state": 0
    },
    {
        "id": 55,
        "inhalatorName": "Formoterol inhalatiepoeder Novolizer",
        "fabrikant": "Mylan BV",
        "afbeelding": "/inhalators/Formoterol inhalatiepoeder Novolizer.png",
        "gebruikMedicijn": "formoterol",
        "color": "white",
        "state": 0
    },
    {
        "id": 56,
        "inhalatorName": "Salbutamol inhalatiepoeder Novolizer",
        "fabrikant": "Mylan BV",
        "afbeelding": "/inhalators/Salbutamol inhalatiepoeder Novolizer.png",
        "gebruikMedicijn": "salbutamol",
        "color": "white",
        "state": 0
    },
    {
        "id": 58,
        "inhalatorName": "Salbutamol Redihaler dosisaerosol",
        "fabrikant": "Teva Pharma",
        "afbeelding": "/inhalators/Salbutamol Redihaler dosisaerosol.png",
        "gebruikMedicijn": "salbutamol",
        "color": "white",
        "state": 0
    },
    {
        "id": 59,
        "inhalatorName": "Spiolto Respimat",
        "fabrikant": "Boehringer Ingelheim",
        "afbeelding": "/inhalators/Spiolto Respimat.png",
        "gebruikMedicijn": "tiotropium",
        "color": "white",
        "state": 0
    },
    {
        "id": 60,
        "inhalatorName": "Spiolto Respimat",
        "fabrikant": "Boehringer Ingelheim",
        "afbeelding": "/inhalators/Spiolto Respimat.png",
        "gebruikMedicijn": "olodaterol",
        "color": "white",
        "state": 0
    },
    {
        "id": 61,
        "inhalatorName": "Spiriva Respimat",
        "fabrikant": "Boehringer Ingelheim",
        "afbeelding": "/inhalators/Spiriva Respimat.png",
        "gebruikMedicijn": "tiotropium",
        "color": "white",
        "state": 0
    },
    {
        "id": 62,
        "inhalatorName": "Striverdi Respimat",
        "fabrikant": "Boehringer Ingelheim",
        "afbeelding": "/inhalators/Striverdi Respimat.png",
        "gebruikMedicijn": "olodaterol",
        "color": "white",
        "state": 0
    },
    {
        "id": 63,
        "inhalatorName": "Spiromax 160mcg",
        "fabrikant": "Teva",
        "afbeelding": "/inhalators/Spiromax 160mcg.png",
        "gebruikMedicijn": "budesonide",
        "color": "white",
        "state": 0
    },
    {
        "id": 64,
        "inhalatorName": "Spiromax 160mcg",
        "fabrikant": "Teva",
        "afbeelding": "/inhalators/Spiromax 160mcg.png",
        "gebruikMedicijn": "formoterol",
        "color": "white",
        "state": 0
    },
    {
        "id": 65,
        "inhalatorName": "Spiromax 320mcg",
        "fabrikant": "Teva",
        "afbeelding": "/inhalators/Spiromax 320mcg.png",
        "gebruikMedicijn": "budesonide",
        "color": "white",
        "state": 0
    },
    {
        "id": 66,
        "inhalatorName": "Spiromax 320mcg",
        "fabrikant": "Teva",
        "afbeelding": "/inhalators/Spiromax 320mcg.png",
        "gebruikMedicijn": "formoterol",
        "color": "white",
        "state": 0
    },
    {
        "id": 67,
        "inhalatorName": "Bricanyl inhalatiepoeder Turbuhaler",
        "fabrikant": "AstraZeneca",
        "afbeelding": "/inhalators/Bricanyl inhalatiepoeder Turbuhaler.png",
        "gebruikMedicijn": "terbutaline",
        "color": "white",
        "state": 0
    },
    {
        "id": 68,
        "inhalatorName": "Oxis inhalatiepoeder Turbuhaler",
        "fabrikant": "AstraZeneca",
        "afbeelding": "/inhalators/Oxis inhalatiepoeder Turbuhaler.png",
        "gebruikMedicijn": "formoterol",
        "color": "white",
        "state": 0
    },
    {
        "id": 69,
        "inhalatorName": "Pulmicort inhalatiepoeder Turbuhaler",
        "fabrikant": "AstraZeneca",
        "afbeelding": "/inhalators/Pulmicort inhalatiepoeder Turbuhaler.png",
        "gebruikMedicijn": "budesonide",
        "color": "white",
        "state": 0
    },
    {
        "id": 70,
        "inhalatorName": "Symbicort inhalatiepoeder Turbuhaler",
        "fabrikant": "AstraZeneca",
        "afbeelding": "/inhalators/Symbicort inhalatiepoeder Turbuhaler.png",
        "gebruikMedicijn": "formoterol",
        "color": "white",
        "state": 0
    },
    {
        "id": 71,
        "inhalatorName": "Symbicort inhalatiepoeder Turbuhaler",
        "fabrikant": "AstraZeneca",
        "afbeelding": "/inhalators/Symbicort inhalatiepoeder Turbuhaler.png",
        "gebruikMedicijn": "budesonide",
        "color": "white",
        "state": 0
    },
    {
        "id": 72,
        "inhalatorName": "Zonda",
        "fabrikant": "Teva",
        "afbeelding": "/inhalators/Zonda.png",
        "gebruikMedicijn": "tiotropium",
        "color": "white",
        "state": 0
    },
    {
        "id": 73,
        "inhalatorName": "Avamys corticosteroid neusspray",
        "fabrikant": "GSK",
        "afbeelding": "/inhalators/Avamys corticosteroid neusspray.png",
        "gebruikMedicijn": "corticosteroid neusspray",
        "color": "white",
        "state": 0
    },
    {
        "id": 74,
        "inhalatorName": "Corticosteroid neusspray",
        "fabrikant": "",
        "afbeelding": "/inhalators/Corticosteroid neusspray.png",
        "gebruikMedicijn": "corticosteroid neusspray",
        "color": "white",
        "state": 0
    }
]
```
