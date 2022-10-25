# Instalar
#### `npm install`
#### `composer`

## Configuración de BASE DE DATOS
En el archivo `.env` se debe colocar la siguiente variable
#### `DB_CONNECTION=mysql`
#### `DB_DATABASE=social-network`
#### `QUEUE_CONNECTION=database`
#### `MAIL_MAILER=smtp`
#### `MAIL_HOST=smtp.mailtrap.io`

De la cuenta que se cree en mailtrap:
#### `MAIL_USERNAME=XXXXXXX`
#### `MAIL_PASSWORD=XXXXXXX`

# Correr

1. Correr XAMMP
2. Correr los siguientes comandos en dos terminales diferentes:
#### `php artisan serve`
#### `npm run dev`

# Notas
## PHP commands
### Create new Users
    php artisan db:seed

### Create new controllers:
    php artisan make:controller User\\MemberController -r

### Mail notifications
    php artisan make:notification SomeonePosted --markdown=mail.posts.posted

### Notificaciton
    php artisan notifications:table


## If you forget commands:
    php artisan
## Package used
### SweetAlert2
    https://sweetalert2.github.io/#download

    npm install sweetalert2
### Fonts awesome
    https://fontawesome.com/docs

### Epic spinners
    https://epic-spinners.epicmax.co/get-started

    npm install --save epic-spinners

### Mail trap
    https://mailtrap.io/home

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

