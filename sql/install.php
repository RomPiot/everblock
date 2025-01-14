<?php
/**
 * 2019-2023 Team Ever
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
 *  @author    Team Ever <https://www.team-ever.com/>
 *  @copyright 2019-2021 Team Ever
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

$sql = [];

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'everblock` (
        `id_everblock` int(10) unsigned NOT NULL auto_increment,
        `name` text NOT NULL,
        `id_hook` int(10) unsigned NOT NULL,
        `only_home` int(10) unsigned DEFAULT NULL,
        `only_category` int(10) unsigned DEFAULT NULL,
        `device` int(10) unsigned NOT NULL DEFAULT 0,
        `id_shop` int(10) unsigned NOT NULL,
        `position` int(10) unsigned DEFAULT 0,
        `categories` text DEFAULT NULL,
        `groups` text DEFAULT NULL,
        `background` varchar(255) DEFAULT NULL,
        `css_class` varchar(255) DEFAULT NULL,
        `bootstrap_class` varchar(255) DEFAULT NULL,
        `date_start` DATETIME DEFAULT NULL,
        `date_end` DATETIME DEFAULT NULL,
        `active` int(10) unsigned NOT NULL,
        PRIMARY KEY (`id_everblock`)
    ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8';

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'everblock_lang` (
    	`id_everblock` int(10) unsigned NOT NULL,
        `id_lang` int(10) unsigned NOT NULL,
    	`content` text DEFAULT NULL,
        `custom_code` text DEFAULT NULL,
    	PRIMARY KEY (`id_everblock`, `id_lang`)
    ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8';

// Shortcodes
$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'everblock_shortcode` (
        `id_everblock_shortcode` int(10) unsigned NOT NULL auto_increment,
        `shortcode` text DEFAULT NULL,
        `id_shop` int(10) unsigned NOT NULL,
        PRIMARY KEY (`id_everblock_shortcode`)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'everblock_shortcode_lang` (
        `id_everblock_shortcode` int(10) unsigned NOT NULL,
        `id_lang` int(10) unsigned NOT NULL,
        `title` text DEFAULT NULL,
        `content` text DEFAULT NULL,
        PRIMARY KEY (`id_everblock_shortcode`, `id_lang`)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';

foreach ($sql as $s) {
    if (!Db::getInstance()->execute($s)) {
        return false;
    }
}
