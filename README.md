Teckboard
========================

Require
--------------

- `php 5.5`
- `mysql`
- `npm`

Install
--------------

[1] npm install -g bower
[2] npm install
[3] bower install
[4] Create and configure app/config/parameters.yml (Model : app/config/parameters.yml.dist)
[5] Update schema : php app/console doctrine:schema:update --force
[6] Import data-fixtures : php app/console doctrine:fixtures:load