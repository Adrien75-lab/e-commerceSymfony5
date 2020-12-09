release : php bin/console cache:clear && php bin/console doctrine:migrations:migrate && php bin/console doctrine:query:sql
web: heroku-php-apache2 public/
