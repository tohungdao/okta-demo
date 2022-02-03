inq8880M:okta-demo localadmin$ heroku -v
heroku/7.59.2 darwin-x64 node-v12.21.0
inq8880M:okta-demo localadmin$ heroku login
heroku: Press any key to open up the browser to login or q to exit: 
Opening browser to https://cli-auth.heroku.com/auth/cli/browser/e578b5de-4c35-4e4e-829c-8bc891ea48b1?requestor=SFMyNTY.g2gDbQAAAA03MS4xNjIuMjExLjQxbgYA6DTCln4BYgABUYA.naDlu35RDnGoubvGzJRGUhY2aeCjDptlnLTotrLha1k
Logging in... done
Logged in as tohungdao@yahoo.com
inq8880M:okta-demo localadmin$ pwd
/Users/localadmin/okta-demo
inq8880M:okta-demo localadmin$ git branch
* main
inq8880M:okta-demo localadmin$ heroku create
Creating app... done, ⬢ blooming-wave-44927
https://blooming-wave-44927.herokuapp.com/ | https://git.heroku.com/blooming-wave-44927.git

* The application ID will differ, but make a note of it. It’s a part of the deployment URL of your application (in this example, it’s https://warm-bastion-91341.herokuapp.com/).

Head to Okta, edit your application and replace http://localhost:8000/ with your deployment URL. Using the example above, you would set:

Login redirect URIs: https://warm-bastion-91341.herokuapp.com/login/okta/callback
Initiate login URI: https://warm-bastion-91341.herokuapp.com/


* add ENV VAR to Heroku server:
* Then set the Okta keys you want to use (make sure to replace the callback URL with the new heroku deployment URL):

heroku config:set APP_KEY=$(php artisan --no-ansi key:generate --show)
heroku config:set OKTA_CLIENT_ID=0oa3jxoianjcVUKOv5d7
heroku config:set OKTA_CLIENT_SECRET=Us0Xaa788Obsn5IBmnapo1o0vy4ENdyeruA8uFZ7
heroku config:set OKTA_BASE_URL=dev-23929616.okta.com
heroku config:set OKTA_REDIRECT_URI=https://blooming-wave-44927.herokuapp.com/login/okta/callback
heroku config:set DB_CONNECTION=pgsql

* Okta Applications/setting: 

Allow wildcard * in login URI redirect.
http://localhost:8080/authorization-code/callback
Sign-out redirect URIs 
http://localhost:8080

* per video https://www.youtube.com/watch?v=HXTFn4ADn4c
* in root dir, add file ".htaccess" as below

<IfModule mod_rewrite.c>

    RewriteEngine On

    RewriteCond %{REQUEST_URI} !^public

    RewriteRule ^(.*)$ public/$1 [L]
    
</IfModule>

* Git
inq8880M:okta-demo localadmin$ git config --global user.name "tohungdao"
inq8880M:okta-demo localadmin$  git config --global user.email tohungdao@yahoo.com
inq8880M:okta-demo localadmin$ git commit --amend --reset-author


---------- Laravel 8 require lib = ui, vue --auth => https://www.youtube.com/watch?v=aBOXmdyRJpQ ------

*OLD : php artisan make:auth

composer require laravel/ui
php artisan ui vue --auth
composer require laravel/socialite socialiteproviders/okta

-- OLD: php artisan make:auth

------log-----

inq8880M:okta-demo localadmin$ heroku config:set DB_CONNECTION=pgsql
Setting DB_CONNECTION and restarting ⬢ blooming-wave-44927... done, v8
DB_CONNECTION: pgsql
inq8880M:okta-demo localadmin$ heroku config:set OKTA_REDIRECT_URI=https://blooming-wave-44927.herokuapp.com/login/okta/callback
Setting OKTA_REDIRECT_URI and restarting ⬢ blooming-wave-44927... done, v9
OKTA_REDIRECT_URI: https://blooming-wave-44927.herokuapp.com/login/okta/callback
inq8880M:okta-demo localadmin$ heroku config:set OKTA_CLIENT_ID=0oa3jxoianjcVUKOv5d7
Setting OKTA_CLIENT_ID and restarting ⬢ blooming-wave-44927... done, v10
OKTA_CLIENT_ID: 0oa3jxoianjcVUKOv5d7
inq8880M:okta-demo localadmin$ heroku config:set OKTA_CLIENT_SECRET=Us0Xaa788Obsn5IBmnapo1o0vy4ENdyeruA8uFZ7
Setting OKTA_CLIENT_SECRET and restarting ⬢ blooming-wave-44927... done, v11
OKTA_CLIENT_SECRET: Us0Xaa788Obsn5IBmnapo1o0vy4ENdyeruA8uFZ7
inq8880M:okta-demo localadmin$ heroku config:set OKTA_BASE_URL=dev-23929616.okta.com
Setting OKTA_BASE_URL and restarting ⬢ blooming-wave-44927... done, v12
OKTA_BASE_URL: dev-23929616.okta.com
inq8880M:okta-demo localadmin$ heroku config:set OKTA_REDIRECT_URI=https://blooming-wave-44927.herokuapp.com/login/okta/callback
Setting OKTA_REDIRECT_URI and restarting ⬢ blooming-wave-44927... done, v12
OKTA_REDIRECT_URI: https://blooming-wave-44927.herokuapp.com/login/okta/callback
inq8880M:okta-demo localadmin$ 

****** routes nameSpace *****

Case 1
We can change in api.php and in web.php files like below. The current way we write syntax is

Route::get('login', 'LoginController@login');
That should be changed to:

Route::get('login', [LoginController::class, 'login']);

Case 2
First go to the file: app > Providers > RouteServiceProvider.php

In that file replace the line protected $namespace = null; with protected $namespace = 'App\Http\Controllers';

** config/app.php, services.php; app/Providers/EventServicePrroviders.php => https://socialiteproviders.com/usage/#_5-usage 