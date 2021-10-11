<?php

namespace Payment\Enum;

abstract class SpPaymentSource
{
   const Mobile = 0;
   const Web = 1;
   const Sdk = 2;
}

$today = SpPaymentSource::Mobile;

////////////////////////////////////////////
class PaymentStatus extends Enum
{
    const INITIATED = 'initiated';
    const PENDING   = 'pending';
    const COMPLETED = 'completed';
    const FAILED    = 'failed';
}

$var = PaymentStatus::COMPLETED;
