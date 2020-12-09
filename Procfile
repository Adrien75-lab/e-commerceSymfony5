release : php bin/console cache:clear && php bin/console doctrine:migrations:migrate && php bin/console doctrine:database:import --no-interaction
web: heroku-php-apache2 public/
