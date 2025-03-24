# Проект на Laravel

Этот проект представляет собой простой интернет-магазин, разработанный на фреймворке Laravel 8+. В проекте реализован каталог товаров, корзина и система заказов с авторизацией пользователей.

## Стек технологий

- **PHP 7+**
- **Laravel 8+**
- **MySQL**
- **Bootstrap 4**
- **Git**

## Функциональность

1. **Каталог товаров:**
   - Просмотр списка товаров.
   - Добавление товаров в корзину с указанием количества.
   - Проверка наличия товара на складе.

2. **Корзина:**
   - Просмотр товаров в корзине.
   - Удаление товаров из корзины.
   - Очистка корзины.
   - Переход к оформлению заказа.

3. **Оформление заказа:**
   - Просмотр товаров в корзине.
   - Общая стоимость всех товаров в заказе.
   - Оформление заказа и сохранение его в базе данных.

4. **Список заказов:**
   - Просмотр всех заказов пользователя.
   - Удаление заказа.
   - Итоговая стоимость всех заказов.

5. **Авторизация:**
   - Регистрация новых пользователей.
   - Вход и выход из системы.
   - Защита маршрутов заказов для авторизованных пользователей.

## Установка и настройка

### 1. Клонирование репозитория

```bash
git clone https://github.com/MattewMattew/shop.git
cd shop
```

### 2. Установка зависимостей
  - Убедитесь, что у вас установлен Composer. Если нет, установите его с официального сайта .
  - composer install
  
### 3. ENV
  - Мой .env выглядит вот так:

```plaintext
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mysql
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

### 4. Применение миграций и заполнение данных
   - Примените миграции и заполните базу данных тестовыми данными
```bash
php artisan migrate --seed
```

### 5. Запуск локального сервера
   - Запустите локальный сервер разработки:
```bash
php artisan serve
```
   
