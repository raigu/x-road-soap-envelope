<?php

namespace Raigu\XRoad\SoapEnvelope;

use DOMDocument;
use Raigu\XRoad\SoapEnvelope\Element\FragmentInjection;
use Raigu\XRoad\SoapEnvelope\Element\XmlInjectable;

/**
 * I am a request of an X-Road service.
 *
 * I can inject myself into SOAP envelope body.
 */
final class ServiceRequest implements XmlInjectable
{
    /**
     * @var XmlInjectable
     */
    private $element;

    public function inject(DOMDocument $dom): void
    {
        $this->element->inject($dom);
    }

    /**
     * @param string $serviceRequest service request as XML.
     *                               Demo video how you can construct me:
     *                               https://www.youtube.com/watch?v=ziQIwlTtPLA
     */
    public function __construct(string $serviceRequest)
    {
        $this->element = new FragmentInjection(
            'http://schemas.xmlsoap.org/soap/envelope/',
            'Body',
            $serviceRequest
        );
    }
}
