<?php

namespace Raigu\XRoad\SoapEnvelope\Element;

use DOMDocument;

/**
 * I am an XML element aggregated from many elements.
 */
abstract class AggregatedElement implements XmlInjectable
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
