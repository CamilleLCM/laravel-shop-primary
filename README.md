# Laravel 初级实战项目
* 该项目实现了用户模块，管理后台，商品模块，购物车&订单模块，
支付宝支付，优惠券模块
## 搭建步骤
### 一、clone该项目
### 二、安装项目依赖
* 先实现`composer`安装加速
```php
$ composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/ 
```
* 安装依赖
```php
$ composer install
```
### 三、安装 Nodejs 依赖
* 配置镜像加速：
```php
$ yarn config set registry https://registry.npm.taobao.org
```
* yarn 命令安装 Nodejs 依赖
```php
$ SASS_BINARY_SITE=http://npm.taobao.org/mirrors/node-sass yarn
```
* 编译前端代码
```php
$ yarn dev
```
### 配置.env
```php
APP_NAME="Laravel Shop"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://shop.test

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=mysql //这里的开发环境为docker所以改为mysql不为docker的请自行改成127.0.0.1
DB_PORT=3306
DB_DATABASE=//你的数据库名
DB_USERNAME=//你的数据库用户名
DB_PASSWORD=//你的数据库密码

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=redis
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_CLIENT=predis
REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog //这里的开发环境为docker所以改为mailhog不为docker的请自行改成127.0.0.1
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=shop@shop.test
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

TIMEZONE=Asia/Shanghai

```
* 使用命令生成APP_KEY值
> php artisan key:generate

### 初始化数据库

* 执行数据库迁移
> php artisan migrate

* 导入管理后台数据
> $ php artisan db:seed --class=AdminTablesSeeder

* 创建后台用户
> php artisan admin:create-user

### 在`/config`目录下创建`pay.php`初始化支付宝配置

```php 
<?php

return [
    'alipay' => [
        'app_id'         => '',//配置你的支付宝app_id
        'ali_public_key' => '',//配置你的支付宝公钥
        'private_key'    => '',//配置私钥
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id'      => '',
        'mch_id'      => '',
        'key'         => '',
        'cert_client' => '',
        'cert_key'    => '',
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];
```
