# Laravel-RBAC
基于Laravel5.6 开发的RBAC 管理后台


一：拉取项目

git clone https://github.com/Adolph-InnerMongolia/Laravel-RBAC.git

二：执行composer 

composer update

三：配置数据库

在 .env 设置数据库
  DB_CONNECTION=mysql
  
  DB_HOST=127.0.0.1
  
  DB_PORT=3306
  
  DB_DATABASE=blog
  
  DB_USERNAME=root
  
  DB_PASSWORD=password
  
  去创建一个名为blog的数据库
  
  执行 php artisan migrate 命令
  
 四:创建默认数据
 
  执行 php artisan db:seed
 
