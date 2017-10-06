# GPA
#### Gestión de Productos Alimenticios

### **Sobre GPA**


-----


#### GPA es un un sistema que se enfocara en la gestion de los productos alimenticios, mediante una plataforma web amigable. 


- Configuracion del entorno

    1) Renombrar el archivo .env.example por .env y reemplazar las variables de configuracion de base de datos y otros

- Configuracion de Desarrollo

	1) Ejecutar las migraciones
	    ` php artisan migrate `

	2) Reconocer los seeders
	    ` composer dump-autoload `

	3) Precargar la base de datos a traves de los seeders
	    ` php artisan db:seed `

- Usuario Root
	- user: admin
	- email: admin@bmkeros.org.ve
	- password:	admin

- Usuario User
    - user: user
	- email: user@bmkeros.org.ve
	- password:	user
	
- Usuario Socio
    - user: socio
	- email: socio@bmkeros.org.ve
	- password:	socio