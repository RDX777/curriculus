#!/bin/bash

/usr/local/bin/php artisan serve --host=0.0.0.0 --port=9000 &
/usr/local/bin/php artisan reverb:start --host=0.0.0.0 --port=6001 --debug &
/usr/local/bin/php artisan queue:work --timeout=0

#--hostname="curriculus.app.mdgintermediacoes.com.br"