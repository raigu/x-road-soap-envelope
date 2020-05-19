<?php

namespace Raigu\XRoad\SoapEnvelope\Element;

use DOMDocument;

/**
 * I am an XML element.
 *
 * I can inject myself into given XML.
 */
interface XmlInjectable
{
    public function inject(DOMDocument $dom): void;
}
