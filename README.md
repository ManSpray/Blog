## Blog app
### Setup

1. Open CMD and type:
```
composer create-project laravel/laravel {your_localhost_directory}
```
2. Install Laravel UI and NPM by typing:
```
composer require laravel/ui
```
```
php artisan ui vue --auth
```
```
npm install && npm run dev
```
3. Create a new database with Your desired name and update following information inside .env file by your setup:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1     
DB_PORT=3306          
DB_DATABASE={laraveldb} 
DB_USERNAME={root}    
DB_PASSWORD={rootpsw}   
```
4. Now You can extract this repository files inside your directory and accept with all changes.

5. Open CMD once again and type:
```
php artisan migrate
```
6. Open through Your webrowser localhost

7. Good luck!



