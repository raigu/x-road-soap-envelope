<?php

namespace Raigu\XRoad\SoapEnvelope;

use Raigu\XRoad\SoapEnvelope\Element\AggregatedElement;

/**
 * I am an unique X-Road request id.
 *
 * I assign a random id to myself upon creation.
 * I can inject myself into SOAP envelope header
 */
final class UniqueId extends AggregatedElement
{
    public function __construct()
    {
        parent::__construct(
            new Id(
                bin2hex(random_bytes(16))
            )
        );
    }
}
