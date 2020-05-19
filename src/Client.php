<?php

namespace Raigu\XRoad\SoapEnvelope;

use Raigu\XRoad\SoapEnvelope\Element\AbstractElement;
use Raigu\XRoad\SoapEnvelope\Element\DOMElementInjection;
use Raigu\XRoad\SoapEnvelope\Element\FragmentInjection;
use Traversable;

/**
 * I am an X-Road client description.
 *
 * I can inject myself into SOAP envelope header
 */
final class Client extends AbstractElement
{

    /**
     * @param Traversable|array $reference associative array of data describing
     *        client who is making the X-Road request. Data is embedded into
     *        proper place in SOAP Header. The key must be tag name and value
     *        tag value.
     */
    public function __construct($reference)
    {
        $elements = [
            new FragmentInjection(
                'http://schemas.xmlsoap.org/soap/envelope/',
                'Header',
                '<xrd:client xmlns:xrd="http://x-road.eu/xsd/xroad.xsd" ' .
                'xmlns:id="http://x-road.eu/xsd/identifiers" ' .
                'id:objectType="SUBSYSTEM"/>'
            ),
        ];

        foreach ($reference as $name => $value) {
            $elements[] = new DOMElementInjection(
                'http://x-road.eu/xsd/xroad.xsd',
                'client',
                new \DOMElement($name, $value, 'http://x-road.eu/xsd/identifiers')
            );
        }

        parent::__construct(...$elements);
    }
}
