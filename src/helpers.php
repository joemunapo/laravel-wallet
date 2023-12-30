<?php

use O21\LaravelWallet\Contracts\TransactionCreator;
use O21\LaravelWallet\Numeric;

if (! function_exists('num')) {
    /**
     * Create a new Numeric instance for safe calculations
     *
     * @param  string|float|int|\O21\LaravelWallet\Numeric  $value
     * @return \O21\LaravelWallet\Numeric
     */
    function num(string|float|int|Numeric $value): Numeric
    {
        return new Numeric($value);
    }
}

if (! function_exists('transaction')) {
    function transaction(
        string|float|int|Numeric|null $amount = null,
        ?string $currency = null
    ): TransactionCreator {
        $creator = app(TransactionCreator::class);

        if ($amount) {
            $creator->amount($amount);
        }

        if ($currency) {
            $creator->currency($currency);
        }

        return $creator;
    }
}

if (! function_exists('deposit')) {
    function deposit(
        string|float|int|Numeric $amount,
        ?string $currency = null
    ): TransactionCreator {
        $creator = transaction()->processor('deposit');

        if ($currency) {
            $creator->currency($currency);
        }

        return $creator->amount($amount);
    }
}

if (! function_exists('charge')) {
    function charge(
        string|float|int|Numeric $amount,
        ?string $currency = null
    ): TransactionCreator {
        $creator = transaction()->processor('charge');

        if ($currency) {
            $creator->currency($currency);
        }

        return $creator->amount($amount);
    }
}

if (! function_exists('transfer')) {
    function transfer(
        string|float|int|Numeric $amount,
        ?string $currency = null
    ): TransactionCreator {
        $creator = transaction()->processor('transfer');

        if ($currency) {
            $creator->currency($currency);
        }

        return $creator->amount($amount);
    }
}
