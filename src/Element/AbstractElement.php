<?php

namespace Raigu\XRoad\SoapEnvelope\Element;

use DOMDocument;

/**
 * I am an abstract XML element.
 *
 * I can aggregate zero to many elements.
 * I can inject all elements into given XML.
 */
abstract class AbstractElement implements XmlInjectable
{
    /**
     * @var XmlInjectable[]
     */
    private $elements;

    public function inject(DOMDocument $dom): void
    {
        foreach ($this->elements as $element) {
            $element->inject($dom);
        }
    }

    public function __construct(XmlInjectable ...$elements)
    {
        $this->elements = $elements;
    }
}
