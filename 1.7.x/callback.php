<?php

require_once(dirname(__FILE__) . '/../../config/config.inc.php');
require_once(dirname(__FILE__) . '/mttools.php');
require_once(dirname(__FILE__) . '/mtpayment.php');

$hash = Tools::getValue('hash');

$hash = true;

if ($hash !== false) {
    $data = Tools::jsonDecode(MTTools::decrypt($hash, Configuration::get(MTConfiguration::NAME_SECRET_KEY)));

    $data = new stdClass();
    $data->callback_uuid = uniqid();
    $data->custom = new stdClass();
    $data->custom->description = '6_1485441404';
    $data->custom->data = new stdClass();
    $data->custom->data->amount = '31.45';

    /*if (isset($data)) {
        $data->custom = isset($data->custom) ? Tools::jsonDecode($data->custom) : null;
    }

    if (!isset($data->custom) && !isset($data->custom->description)) {
        die();
    }*/

    $message = '';
    $transaction = explode('_', $data->custom->description);

    if (count($transaction) != 2) {
        die();
    }

    if (MTCallbacks::exists($data->callback_uuid)) {
        die('OK');
    }

    $success = false;

    try {
        $id_cart = $transaction[0];
        $id_transaction = implode('_', $transaction);
		
        $success = MTOrders::close(
            $id_transaction,
            $data->custom->data->amount
        );
    } catch (Exception $e) {
        die();
    }

    if ($success) {
        MTCallbacks::insert($data->callback_uuid, $data->custom->description, $data->custom->data->amount);
        die('OK');
    }
}

die();
