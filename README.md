# brotherstraining

This project was originally written by saints in UC Berkeley, transplanted through Canada and now is maintained in Boston for the Boston Area Training on Eldership.

### Setup

This is a standard php + mysql stack project. Downloading and installing any of the following standard *amp framework for your OS will work.

 - [MAMP](https://www.mamp.info/en/) -> Macbook
 - [WAMP](http://www.wampserver.com/en/) -> Windows
 - [LAMP](http://howtoubuntu.org/how-to-install-lamp-on-ubuntu) -> Ubuntu (Linux)

 - Create a database called ```brotherstraining```
 - Import the db schema from ```database/db_schema.sql```. 
 - You will need to create a member entry to be able to sign in. To do so, go to "For Local Administrators -> Register Administrator" to register an administrator.

### Database Config

Database config files live in ```includes/psl-config.php```. Please update accordingly depending on working in local/production environment.

Default local settings for your database is:
```
HOST: localhost
USER: root
PASSWORD: root
DATABASE: brotherstraining
```

### Contribute

If there are any bugs, please file an issue and/or submit PR's to the repo. Thanks for sharing!
