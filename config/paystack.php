<?php

/*
 * This file is part of the Laravel Paystack package.
 *
 * (c) Prosper Otemuyiwa <prosperotemuyiwa@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /**
     * Public Key From Paystack Dashboard
     *
     */
    'publicKey' => 'pk_test_78b952ed6797a27edbc3fa6c89f6c7e984469068',

    /**
     * Secret Key From Paystack Dashboard
     *
     */
    'secretKey' =>'sk_test_e7c7b18db14e6480261d2459b262fcb2401ca447',

    /**
     * Paystack Payment URL
     *
     */
    'paymentUrl' => 'https://api.paystack.co',

    /**
     * Optional email address of the merchant
     *
     */
    'merchantEmail' => getenv('MERCHANT_EMAIL'),

];
