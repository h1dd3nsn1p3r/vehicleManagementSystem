# MINIPHP

Simple database assignment done using lightweight PHP framework called Mini. 

## Requirements

- PHP versions 7.1, 7.2., 7.3 and 7.4. 
- The latest PHP 8.0 is not tested yet but should also work fine.
- MySQL 8.0 or MariaDB 10.3++

## Quick-Start

- You can simply downlaod this project in `xampp/htdocs` folder. 
- Rename the folder name from `miniphp-main` to `miniphp` or any desired name (Optional)
- Then start the Apache and MySQL server. 
- Import the database `toyota.sql` which is located at `miniphp/_install` folder.
- Then you can access the project by typing `localhost/miniphp` in your browser.

#### The structure in general

The application's URL-path translates directly to the controllers (=files) and their methods inside 
application/controllers. 

`example.com/home` will do what the *index()* method in application/controllers/home.php says.

`example.com` will do what the *index()* method in application/controllers/home.php says (default fallback).

`example.com/vehicles` will do what the *index()* method in application/controllers/songs.php says.

`example.com/vehicles/editVehicle/2` will do what the *editVehicle()* method in application/controllers/songs.php says and
will pass `2` as a parameter to it.

Self-explaining, right ?

### Debugging

Debug SQL queries, you can enable the debugging mode by adding following code 

```
echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
```

just under the `$parameters` array.

### Credits

This project is based on the [MiniPHP](https://github.com/panique/mini) framework by panique.
