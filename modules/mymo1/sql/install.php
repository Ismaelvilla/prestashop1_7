<?php
/**
* 2007-2020 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2020 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/
$sql = array();


$sql[0] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'mymo1` (
    `id_mymo1` int(11) NOT NULL AUTO_INCREMENT,
    PRIMARY KEY  (`id_mymo1`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';

$sql[1] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'mymo11` (
    `id_mymo11` int(11) NOT NULL AUTO_INCREMENT,
    `prueba` varchar(50) NOT NULL,
    PRIMARY KEY  (`id_mymo11`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';


foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}

Db::getInstance()->insert('mymo11', array(
    'id_mymo11' =>'2',
    'prueba' =>'esto es una prueba'
));

/*Db::getInstance()->delete('mymo11', 'id_mymo11 = 2',1);*/

$sql = 'UPDATE '. _DB_PREFIX_.'mymo11 SET prueba ="Esta modificada" WHERE id_mymo11=2';
Db::getInstance()->execute($sql);


/*
Db:getInstance()->update('mymo11', array(
    'prueba' => 'prueba actualizada'
), 'id_mymo11 = 2',1);*/

/*Db::getInstance()->delete('mymo11', 'id_mymo11 = 2',1);*/

