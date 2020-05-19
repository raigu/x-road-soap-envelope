<?php

namespace Raigu\XRoad\SoapEnvelope;

use Raigu\XRoad\SoapEnvelope\Element\AggregatedElement;
use Raigu\XRoad\SoapEnvelope\Element\DOMElementInjection;

/**
 * I am an X-Road Message SOAP header element
 *
 * I know how to inject myself into SOAP header with proper XML namespace.
 */
final class SoapHeaderElement extends AggregatedElement
{
    public function __construct(string $tagName, string $tagValue)
    {
        parent::__construct(
            new DOMElementInjection(
                'http://schemas.xmlsoap.org/soap/envelope/',
                'Header',
                new \DOMElement(
                    $tagName,
                    $tagValue,
                    'http://x-road.eu/xsd/xroad.xsd'
                )
            )
        );
    }
}
