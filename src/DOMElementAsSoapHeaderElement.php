<?php

namespace Raigu\XRoad\SoapEnvelope;

use DOMDocument;
use DOMElement;
use Raigu\XRoad\SoapEnvelope\Element\DOMElementInjection;
use Raigu\XRoad\SoapEnvelope\Element\XmlInjectable;

/**
 * I am a DOMElement of SOAP header.
 *
 * I can inject myself into SOAP envelope header
 */
abstract class DOMElementAsSoapHeaderElement implements XmlInjectable
{
    /**
     * @var XmlInjectable
     */
    private $element;

    public function inject(DOMDocument $dom): void
    {
        $this->element->inject($dom);
    }

    public function __construct(DOMElement $element)
    {
        $this->element = new DOMElementInjection(
            'http://schemas.xmlsoap.org/soap/envelope/',
            'Header',
            $element
        );
    }
}
