# 그룹 모임 서비스
## Skills
- PHP 7.4
- Laravel 8
- Vue.js 2.6

## Setup
### 프로젝트 생성하기
```
composer create-project laravel/laravel band
```

### Vue.js 설치하기
```
composer require laravel/ui
```

```
php artisan ui vue
```

```
npm install
npm run dev
```

## :memo: SPA 인증
### Sanctum 이란
- 토큰을 사용하지 않는 쿠키 기반의 Session Authentication
- CSRF 보호, 세션 인증, XSS를 통한 인증 자격 증명(Authentication Credentials) 유출 방지
- 자신의 SPA frontend에서 시작된 경우에만 쿠키를 사용하여 인증을 시도

### Sanctum 설치
```
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php migrate
```

### Sanctum 설정
```php
// /App/Http/Kernel.php
protected $middlewareGroups = [
    // ...
    'api' => [
                \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
                'throttle:api',
                \Illuminate\Routing\Middleware\SubstituteBindings::class,
            ],
];
```

<br>

인증 정보가 유지되는 경로이므로, 8000 포트를 사용한다면 `localhost:8000`을 추가한다.
```php
// config/sanctum.php
    'stateful' => explode(',', env('SANCTUM_STATEFUL_DOMAINS', sprintf(
        '%s%s',
        'localhost,localhost:3000,localhost:8000,127.0.0.1,127.0.0.1:8000,::1',
        env('APP_URL') ? ','.parse_url(env('APP_URL'), PHP_URL_HOST) : ''
    ))),
```

### 인증 모델 변경
```php
// /config/auth.php
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\Member::class,
        ],
```

```php
// /App/Models/Member.php
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable {
    // ...
}
```

### 로그인 인증하기
```php
use Illuminate\Support\Facades\Auth;

if (Auth::attempt($data)) {
    // 인증 성공
} else {
    // 인증 실패
}
```

### 인증된 (로그인한) 사용자 정보 가져오기
```php
$user = Auth:user();
```

### 로그아웃 처리하기
```php
Auth::guard('web')->logout();
```

## :memo: 참고 - 명령어
### 1. Database
- migration 파일 생성하기
```
php artisan make:migration create_테이블이름(복수형)_table
```

- migration 실행하기
```
php artisan migrate
```

- migration 되돌리기 : 가장 최근에 실행했던 migration을 되돌린다.
```
php artisan migrate:rollback
```

- migration 모두 되돌리기 : 모든 migration을 되돌린다.
```
php artisan migrate:reset
```

- migration 되돌리기 & migration 실행하기 : 모든 migration을 되돌리고, migration을 다시 실행한다. 
```
php artisan migrate:refresh
```

### 2. Model
- Model 생성하기
```
php artisan make:model 모델이름(단수형)
```

- Model, Controller, Migration 파일 한번에 생성하기
```
php artisan make:model 모델이름(단수형) -c -m
```

### 3. Controller
- Controller 생성하기
```
php artisan make:controller 컨트롤러이름
```
