steps to run project

1- make db by name 
    ->ecom

2- run cmds     
    php artisan migrate
    php artisan passport:install --force
    php artisan migrate:fresh --seed    
3- import collection in postman 
    collection file is in public/collection
4-Register User and coppy token for  future use in apis    