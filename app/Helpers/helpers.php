<?php

	function salesTypes($type = null) {
		$types = [
			'1' => 'Satış Faturası',
			'3' => 'Satış İade Faturası'
		];

		return ($type == null) ? $types : $types[$type];
	}

	function signOfSalesInvoice($type) {
		$types = [
			'1' => '1',
			'3' => '0'
		];

		return $types[$type];
	}

	function bankTransactions($type = null) {
		$types = [
			'1' => 'Gelen Havale',
			'2' => 'Gönderilen Havale'
		];

		return ($type == null) ? $types : $types[$type];
	}

	function signOfBankTransaction($type) {
		$types = [
			'1' => '1',
			'2' => '0'
		];

		return $types[$type];
	}

    function moneyFormat($amount)
    {
        return number_format($amount, 2, ',', '.');
    }