release : php bin/console cache:clear && php bin/console doctrine:migrations:migrate && php bin/console doctrine:fixtures:load --no-interaction --env=PROD 
web: heroku-php-apache2 public/
