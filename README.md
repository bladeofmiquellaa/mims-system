# Medical Images Management System 
https://drive.google.com/file/d/1p6qk8lWDTXF3y_0JfCOnrKai1RmFIr3K/view?usp=sharing

## Usage

### Database Setup
This app uses MySQL. To use something different, open up config/Database.php and change the default driver.

To use MySQL, make sure you install it, setup a database and then add your db credentials(database, username and password) to the .env.example file and rename it to .env

### Migrations
To create all the nessesary tables and columns, run the following
```
php artisan migrate
```

### Running The App
Upload the files to your document root, Valet folder or run
```
php artisan serve
```

## License

The BlueDesk app is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
