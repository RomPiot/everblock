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

function upgrade_module_4_1_4()
{
    $result = true;
    $moduleColumns = [
        'id_lang' => [
            'type' => 'int(10) unsigned NOT NULL',
            'after' => 'id_everblock',
        ],
        'content' => [
            'type' => 'text DEFAULT NULL',
            'after' => 'id_lang',
        ],
        'custom_code' => [
            'type' => 'text DEFAULT NULL',
            'after' => 'content',
        ],
    ];
    $currentColumns = Db::getInstance()->executeS('SHOW COLUMNS FROM `' . _DB_PREFIX_ . 'everblock_lang`');
    $sql = [];
    $alterTable = true;
    foreach ($moduleColumns as $columnName => $columnType) {
        foreach ($currentColumns as $currentColumn) {
            if ((string) $columnName == (string) $currentColumn['Field']) {
                $alterTable = false;
            }
        }
        if ((bool) $alterTable === true) {
            $sql[] =
                'ALTER TABLE ' . _DB_PREFIX_ . 'everblock_lang
                ADD COLUMN `' . pSQL($columnName) . '` ' . pSQL($columnType['type']) . '
                AFTER `' . pSQL($columnType['after']) . '`
            ';
        }
    }
    foreach ($sql as $s) {
        $result &= Db::getInstance()->execute($s);
    }
    return $result;
}