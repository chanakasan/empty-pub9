# ORM
php app/console doctrine:database:drop --force
php app/console doctrine:database:create
php app/console doctrine:schema:update --force

# ORM fixtures
php app/console doctrine:fixtures:load -n

# PHPCR
php app/console doctrine:phpcr:init --drop
php app/console doctrine:phpcr:repository:init

# PHPCR fixtures
php app/console doctrine:phpcr:fixtures:load -n