IAR
====

Installing / Deploy
-------------------

As IAR uses [Composer][1] to manage its dependencies, the best way
to install and mantain this project is to use it.

If you don't have Composer yet, download it following the instructions on
[http://getcomposer.org/][1] or just run the following command:

    curl -s http://getcomposer.org/installer | php

Then, use the `install` command within the root source path 
to install the dependencies:

    php composer.phar install

Clear the cache:

    php app/console cache:clear


Manual Database Installation. Login to server database and create the db and the db user:

    CREATE DATABASE 'dbname';
    CREATE USER 'username'@'localhost' IDENTIFIED BY 'password';
    GRANT ALL PRIVILEGES ON dbname.* TO 'username'@'localhost';

Then install the database:

    php app/console doctrine:database:create
    php app/console doctrine:schema:create
    php app/console doctrine:fixtures:load

And install the public files in the web directory:

    php app/console assets:install web --symlink

Run the app:

    php app/console server:run 0.0.0.0:8000
    


Running tests
-------------

    php app/console doctrine:database:create --env=test
    php app/console doctrine:schema:create --env=test
    bin/behat --no-snippets --no-paths --verbose
    bin/phpspec run src/Clip/Bundle/WebBundle/spec -fpretty --verbose

[1]:  http://getcomposer.org/
