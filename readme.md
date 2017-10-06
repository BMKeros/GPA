# GPA
#### Gestión de Productos Alimenticios

### **Sobre GPA**


-----


#### GPA es un un sistema que se enfocara en la gestion de los productos alimenticios, mediante una plataforma web amigable. 


- Configuracion del entorno

    1) Renombrar el archivo .env.example por .env y reemplazar las variables de configuracion de base de datos y otros

- Cuando se cree una nueva migracion se debe ejecutar 
    ` composer dump-autoload ` seguido se debe hacer un `php artisan migrate` y por ultimo un `php artisan db:seed`
    
- Una Vez ejecutado los 3 comandos anteriores puedes proseguir a levantar el servidor con el comando `php artisan serve`