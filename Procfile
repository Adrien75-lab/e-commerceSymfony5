release : php bin/console cache:clear && php bin/console doctrine:migrations:migrate && php bin/console doctrine:fixtures:load --no-interaction --env=PROD && php bin/console doctrine:migration:sync-metadata-storage
web: heroku-php-apache2 public/
