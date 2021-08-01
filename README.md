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

## 참고 - 명령어
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
