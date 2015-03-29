Teckboard
========================

Require
--------------

- `php 5.5`
- `mysql`
- `npm`

Install
--------------

- `php composer.phar install`
- `npm install -g bower`
- `npm install`
- `bower install`
- Create and configure `app/config/parameters.yml` (Model : `app/config/parameters.yml.dist`)
- Update schema : `php app/console doctrine:schema:update --force`
- Import data-fixtures : `php app/console doctrine:fixtures:load`
- Lanch assetic compilation : `php app/console assetic:dump --watch`

General informations 
--------------

** Test username ** : test-user / 0000

** API Documentation URL ** : `/doc/api`