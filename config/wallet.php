<?php

return [
    'default_currency' => 'USD',

    'balance' => [
        'accounting_statuses' => [
            \O21\LaravelWallet\Enums\TransactionStatus::SUCCESS,
            \O21\LaravelWallet\Enums\TransactionStatus::ON_HOLD,
            \O21\LaravelWallet\Enums\TransactionStatus::IN_PROGRESS,
            \O21\LaravelWallet\Enums\TransactionStatus::AWAITING_APPROVAL,
        ],
        'extra_values' => [
            // enable value_pending calculation
            'pending' => false,
            // enable value_on_hold calculation
            'on_hold' => false,
        ],
        'log_states' => false,
    ],

    'models' => [
        'balance' => \O21\LaravelWallet\Models\Balance::class,
        'balance_state' => \O21\LaravelWallet\Models\BalanceState::class,
        'custodian' => \O21\LaravelWallet\Models\Custodian::class,
        'transaction' => \O21\LaravelWallet\Models\Transaction::class,
    ],

    'table_names' => [
        'balances' => 'balances',
        'balance_states' => 'balance_states',
        'custodians' => 'custodians',
        'transactions' => 'transactions',
    ],

    'transactions' => [
        'currency_scaling' => [
            'USD' => 2,
            'EUR' => 2,
            'BTC' => 8,
            'ETH' => 8,
        ],

        'route_key' => 'uuid',
    ],

    'processors' => [
        'deposit' => \O21\LaravelWallet\Transaction\Processors\DepositProcessor::class,
        'charge' => \O21\LaravelWallet\Transaction\Processors\ChargeProcessor::class,
        'conversion_credit' => \O21\LaravelWallet\Transaction\Processors\ConversionCreditProcessor::class,
        'conversion_debit' => \O21\LaravelWallet\Transaction\Processors\ConversionDebitProcessor::class,
        'transfer' => \O21\LaravelWallet\Transaction\Processors\TransferProcessor::class,
    ],

    'numeric' => [
        // The scale for a numbers in the operations with precise calculations required
        // (like division, multiplication, etc.)
        'precise_scale' => 22,

        'rounding_mode' => \Brick\Math\RoundingMode::DOWN,
    ]
];
