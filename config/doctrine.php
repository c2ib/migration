<?php
use Symfony\Config\DoctrineConfig;

return static function (DoctrineConfig $doctrine) {
    $doctrine->dbal()->defaultConnection('default');

    // configure these for your database server
    $doctrine->dbal()
        ->connection('default')
        ->url('%env(resolve:DATABASE_URL)%')
        ->driver('pdo_mysql')
        ->serverVersion('5.7')
        ->charset('utf8mb4');

    // configure these for your database server
    $doctrine->dbal()
        ->connection('customer')
        ->url('%env(resolve:DATABASE_CUSTOMER_URL)%')
        ->driver('pdo_mysql')
        ->serverVersion('5.7')
        ->charset('utf8mb4');

    $doctrine->orm()->defaultEntityManager('default');
    $emDefault = $doctrine->orm()->entityManager('default');
    $emDefault->connection('default');
    $emDefault->mapping('Main')
        ->isBundle(false)
        ->type('annotation')
        ->dir('%kernel.project_dir%/src/Entity/Main')
        ->prefix('App\Entity\Main')
        ->alias('Main');

    $emCustomer = $doctrine->orm()->entityManager('customer');
    $emCustomer->connection('customer');
    $emCustomer->mapping('Customer')
        ->isBundle(false)
        ->type('annotation')
        ->dir('%kernel.project_dir%/src/Entity/Customer')
        ->prefix('App\Entity\Customer')
        ->alias('Customer')
    ;
};