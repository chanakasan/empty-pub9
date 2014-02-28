#### Rest API demo using symfony2 and PHPCR
This app uses a backbone.js app in the frontend to display a list of favorite items retrieved from a backend rest api.
The favorite items are stored in a tree-like structure using PHPCR, which allows to store data in a schema-less manner.

##### Requirements

* PHP 5.4 or later
* MYSQL 5.1 or later

##### How to install (Run below commands in your terminal)

    cd rest_demo  # cd to project folder
    curl -s http://getcomposer.org/installer | php  # install composer
    php composer.phar install # install libraries
    chmod +x -R scripts/ # set permission for scripts
    # manual step :( enter database settings
    vim app/config/parameters.yml
    ./scripts/update-schema.sh # load the database
    # All Done !
    app/console server:run # start the server
    # Now visit http://localhost:8000/app_dev.php


##### Display data in the content tree
Below script will display the data stored in the tree-like structure.
    ./scripts/dump-phpcr-nodes.sh
