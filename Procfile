release : php bin/console cache:clear && php bin/console doctrine:migrations:migrate && php bin/console doctrine:seed
web: heroku-php-apache2 public/
