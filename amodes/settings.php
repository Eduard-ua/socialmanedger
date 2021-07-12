<?php
if (!defined("TKM")) {
    die("<pre>Нет доступа!</pre>");
}

$page['title'] = "Настройки";
$page['pid'] = "settings";

$bootstrapVars = [
    'default' => [
        'img' => 'style/img/bootstrap_default.png',
        'url' => '',
    ],
];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $config['main']['site_name'] = (isset($_POST['site_name'])) ? ($_POST['site_name'] != $config['main']['site_name']) ? TextSave($_POST['site_name']) : $config['main']['site_name'] : $config['main']['site_name'];
        $config['main']['mainurl'] = (isset($_POST['mainurl'])) ? ($_POST['mainurl'] != $config['main']['mainurl']) ? TextSave($_POST['mainurl']) : $config['main']['mainurl'] : $config['main']['mainurl'];
        $config['main']['db_host'] = (isset($_POST['db_host'])) ? ($_POST['db_host'] != $config['main']['db_host']) ? TextSave($_POST['db_host']) : $config['main']['db_host'] : $config['main']['db_host'];
        $config['main']['db_name'] = (isset($_POST['db_name'])) ? ($_POST['db_name'] != $config['main']['db_name']) ? TextSave($_POST['db_name']) : $config['main']['db_name'] : $config['main']['db_name'];
        $config['main']['db_user'] = (isset($_POST['db_user'])) ? ($_POST['db_user'] != $config['main']['db_user']) ? TextSave($_POST['db_user']) : $config['main']['db_user'] : $config['main']['db_user'];
        $config['main']['db_pass'] = (isset($_POST['db_pass']) && !empty($_POST['db_pass'])) ? ($_POST['db_pass'] != $config['main']['db_pass']) ? TextSave($_POST['db_pass']) : $config['main']['db_pass'] : $config['main']['db_pass'];
        $config['main']['telephone'] = (isset($_POST['telephone'])) ? ($_POST['telephone'] != $config['main']['telephone']) ? TextSave($_POST['telephone']) : $config['main']['telephone'] : $config['main']['telephone'];
        $config['main']['vk'] = (isset($_POST['vk'])) ? ($_POST['vk'] != $config['main']['vk']) ? TextSave($_POST['vk']) : $config['main']['vk'] : $config['main']['vk'];
        $config['main']['text'] = (isset($_POST['text'])) ? ($_POST['text'] != $config['main']['text']) ? TextSave($_POST['text']) : $config['main']['text'] : $config['main']['text'];


        $config['main']['db_port'] = (isset($_POST['db_port']) && (int)$_POST['db_port'] > 0) ? ($_POST['db_port'] != $config['main']['db_port']) ? (int)$_POST['db_port'] : $config['main']['db_port'] : $config['main']['db_port'];
        //Merchant
        //Fix checkbox reset
        if (@$_GET['id'] == 'merchant') {
            $config['merchant']['fk_enable'] = (isset($_POST['fk_enable'])) ? true : false;
        }
        //Freekassa
        $config['merchant']['fk_shop_id'] = (isset($_POST['fk_shop_id'])) ? ($_POST['fk_shop_id'] != $config['merchant']['fk_shop_id']) ? TextSave($_POST['fk_shop_id']) : $config['merchant']['fk_shop_id'] : $config['merchant']['fk_shop_id'];
        $config['merchant']['fk_shop_key_1'] = (isset($_POST['fk_shop_key_1'])) ? ($_POST['fk_shop_key_1'] != $config['merchant']['fk_shop_key_1']) ? TextSave($_POST['fk_shop_key_1']) : $config['merchant']['fk_shop_key_1'] : $config['merchant']['fk_shop_key_1'];
        $config['merchant']['fk_shop_key_2'] = (isset($_POST['fk_shop_key_2'])) ? ($_POST['fk_shop_key_2'] != $config['merchant']['fk_shop_key_2']) ? TextSave($_POST['fk_shop_key_2']) : $config['merchant']['fk_shop_key_2'] : $config['merchant']['fk_shop_key_2'];

    savecfg();
    MessageSend(3, "Настройки успешно сохранены!");
}

switch (@$_GET['id']) {
    case 'merchant':
        $page['pid'] = "merchant";

        ob_start();
        include STYLE_DIR . '/admin/settings/merchant.html';
        $page['content'] = ob_get_clean();
        break;

    default:
        ob_start();
        include STYLE_DIR . '/admin/settings/main.html';
        $page['content'] = ob_get_clean();
        break;
}