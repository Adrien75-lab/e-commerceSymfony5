release : php bin/console cache:clear && php bin/console doctrine:migrations:migrate --write-sql
web: heroku-php-apache2 public/
