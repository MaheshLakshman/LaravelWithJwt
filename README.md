<p align="centre"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# Laravel with JWT (JSON Web Token)


## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## About JWT

JSON Web Token (JWT) is an open standard (RFC 7519) that defines a compact and self-contained way for securely transmitting information between parties as a JSON object. This information can be verified and trusted because it is digitally signed. JWTs can be signed using a secret (with the HMAC algorithm) or a public/private key pair using RSA or ECDSA.

### Let's start.

Now i am using Laravel Framework 7.12.0 and Jwt Package "tymon/jwt-auth ^1.0".

1. Download

2. Replace .env.example to .env file and place your database name and password for your DB Access.

3. Install packages using "composer install" command.

4. Run Database migration for creating tables in your database, "php artisan migrate".

5. Generate secret key for your JWT "php artisan jwt:secret" it will create a JWT secret key in your .env file

## Test API

I am using postman for verifying my Api.

## Authenticated Requests

There are a number of ways to send the token via http

1. Passing through Authorization Header

Authorization: Bearer token_string..

ex: 
   
   Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL3BocC1tYXN0ZXJcL3B1YmxpY1wvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5MDM4NTQxMywiZXhwIjoxNTkwMzg5MDEzLCJuYmYiOjE1OTAzODU0MTMsImp0aSI6ImJhZkZNUHVMemV4MjM4d0YiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.DIIyw_ZLR66VrtgbPkyuFU6xCjYPgP2HNE3qWQ0sEgc


2. Query string parameter

    http://example.dev/me?token=eyJhbGciOiJIUzI1NiI...


 Test Our few Api,

 #### 1. Register a User

 Method = POST,

 Url = http://localhost/laraveljwtapi/public/api/register

 Authorization = No

 Parameter = 

            {
                "name" : "Mahesh",
                "email" : "mhesssh@i.com",
                "password" : "123456789",
                "password_confirmation" : "123456789"
            }

Response

        {
            "success": true,
            "msg": "Registered Successfully..!"
        }

#### 2. Login


 Method = POST,

 Url = http://localhost/laraveljwtapi/public/api/auth/login

 Authorization = No

 Parameter = 

            {
	            "email":"mhesssh@i.com",
	            "password":"123456789"
            }

Response

            {
                "success": true,
                "data": {
                            "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL3BocC1tYXN0ZXJcL3B1YmxpY1wvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5MDM4NjE4MCwiZXhwIjoxNTkwMzg5NzgwLCJuYmYiOjE1OTAzODYxODAsImp0aSI6InB1UEhkVWI5NmNEekVsdU8iLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.RTLhOhbqeOmmzMFqsgdt3jffoyYRVJuaavWMCLxwKQc",
                            "token_type": "bearer",
                            "expires_in": 3600
                        }
            }

#### 3. Get Login User


 Method = GET,

 Url = http://localhost/laraveljwtapi/public/api/auth/me

 Authorization = Yes (Pass your token)

Response

            {
                "success": true,
                "data": {
                            "id": 1,
                            "name": "Mahesh",
                            "email": "mhesssh@i.com",
                            "email_verified_at": null,
                            "created_at": "2020-05-25T06:04:44.000000Z",
                            "updated_at": "2020-05-25T06:04:44.000000Z"
                       }
            }


#### 4. Logout


 Method = POST,

 Url = http://localhost/laraveljwtapi/public/api/auth/logout

 Authorization = Yes (Pass your token)

Response

            {
                "success": true,
                "msg": "Successfully logged out"
            }

#### 5. Refresh Token

Method = POST,

 Url = http://localhost/laraveljwtapi/public/api/auth/refresh

 Authorization = Yes (Pass your token)

Response

            {
                "success": true,
                "data": {
                            "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2xhcmF2ZWxqd3RhcGlcL3B1YmxpY1wvYXBpXC9hdXRoXC9yZWZyZXNoIiwiaWF0IjoxNTkwMzg3MTIyLCJleHAiOjE1OTAzOTA3NTgsIm5iZiI6MTU5MDM4NzE1OCwianRpIjoiRFdVTDFYMmZoWndnZUNWOCIsInN1YiI6MSwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.uQiGAbusUIbQfkgsEPaQBceAZylKywve89DZMQwdi7o",
                            "token_type": "bearer",
                            "expires_in": 3600
                        }
            }






