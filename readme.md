**Please read the [new and updated version](https://gist.github.com/dovy/3a82773ffc73b2c725d7).**

# Sendy
Sendy is a self hosted email newsletter application that lets you send trackable
emails via Amazon Simple Email Service (SES).

## Heroku
You can deploy Sendy on Heroku using the following instructions (I assume you've
already installed the [heroku toolbelt](https://toolbelt.heroku.com/)).

1. On Heroku, create a new app and add the following add on: [ClearDB](https://addons.heroku.com/cleardb)
   (I chose the free tier).
2. Create a GIT repository with `git init` and commit all the files with
  `git add -A` and `git commit -am "first commit"`.
3. Create a new folder in the root of the project named `ext`. In the same
   folder, place the `mysqli.so` file [downloadable here](https://github.com/elliottcarlson/heroku-php-mysqli).
   In the root folder, create a new file named `php.ini` with the following
   content:
```bash
    extension_dir = "/app/www/ext/"
    extension=mysqli.so
```
   This extension is necessary because Heroku doesn't support MySQLi natively.
   You can read more about MySQLi on Heroku [here](https://devcenter.heroku.com/articles/cleardb#php),
   and about custom php extensions on Heroku [here](http://chrismcleod.me/2011/11/30/use-custom-php-extensions-on-heroku/).

4. Customise the `includes/config.php` and include the following snippet to use
   the ClearDB addon previously selected on Heroku:
```php
    <?php
    define('APP_PATH', 'http://yourdomain.com');

    $url_cleardb = parse_url(getenv("CLEARDB_DATABASE_URL"));

    /*  MySQL database connection credentials  */
    $dbHost = $url_cleardb['host']; //MySQL Hostname
    $dbUser = $url_cleardb['user']; //MySQL Username
    $dbPass = $url_cleardb['pass']; //MySQL Password
    $dbName = substr($url_cleardb["path"],1); //MySQL Database Name
```
   All these settings are necessary to Heroku to automatically hook up the
   ClearDB add-on. More on the settings [here](https://devcenter.heroku.com/articles/cleardb#using-cleardb-with-php).

5. Create a new file named `.buildpacks` in the root of the project with the
   following content:
```bash
    https://github.com/danielepolencic/heroku-buildpack-php.git
    https://github.com/piotras/heroku-buildpack-gettext
```
   These are the scripts that provision and set up the server. The php buildpack
   uses a slighlty tweaked version than the original php buildpack to support
   gettext.

6. Create a new file named `Procfile` in the root of the project with the
   following content:
```bash
    web: sh boot.sh
```
   This file instruct Heroku on how it should launch the application.

7. Add a new remote repository to your local repository:
```bash
    git remote add heroku git@heroku.com:nameofyourapp.git
```
8. Add a custom buildpack to your Heroku application:
```bash
    heroku config:add BUILDPACK_URL=https://github.com/ddollar/heroku-buildpack-multi.git --app nameofyourapp
```
   This instructs Heroku to look into the `.buildpacks` file in the root folder
   of the project and install all the buildpacks listed there.

9. Commit all the changes and push to Heroku:
```bash
    git add -A .
    git commit -am "Sendy customised for heroku deployment"
    git push heroku master
```

## FAQs
*Q:* I'm getting 'Application Error' on Heroku  
*A:* From the command line, try to run `heroku ps:scale web=1 --app yourappname`

*Q:* I've done what you said and I've got another error:
```
   Scaling web dynos... failed
    !    No such process type web defined in Procfile.
```
*A:* You're missing the `Procfile` in the root of your directory. Add the file,
push your changes to Heroku and re-run `heroku ps:scale web=1 --app yourappname`


========================================================


## Seting up Cron
Cron will make your experience much nicer, and not lock up your site.
1. Add the heroku scheduler: `heroku addons:add scheduler:standard`
2. Open the scheduler: `heroku addons:open scheduler`
3. Create two jobs, each with a frequency of 10 mins, and 1x dyno
 * Task 1: `php autoresponders.php > /dev/null 2>&1`
 * Task 2: `php scheduled.php > /dev/null 2>&1`
