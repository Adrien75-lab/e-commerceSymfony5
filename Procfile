release : php bin/console cache:clear && php bin/console doctrine:migrations:migrate --force
web: heroku-php-apache2 public/
