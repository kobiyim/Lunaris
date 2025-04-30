<?php

	function salesTypes($type = null) {
		$types = [
			'1' => 'Satış Faturası',
			'3' => 'Satış İade Faturası'
		];

		return ($type == null) ? $types : $types[$type];
	}

    function moneyFormat($amount)
    {
        return number_format($amount, 2, ',', '.');
    }