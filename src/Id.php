<?php

namespace Raigu\XRoad\SoapEnvelope;

use Raigu\XRoad\SoapEnvelope\Element\AggregatedElement;

/**
 * I am a X-Road Message id.
 *
 * I can inject myself into SOAP envelope header
 */
final class Id extends AggregatedElement
{
    /**
     * @param string $id Unique identifier of X-Road message.
     *             According to the specification recommended
     *             form of message id is UUID.
     * @see https://www.x-tee.ee/docs/live/xroad/pr-mess_x-road_message_protocol.html#22-message-headers
     */
    public function __construct(string $id)
    {
        parent::__construct(
            new SoapHeaderElement('id', $id)
        );
    }
}
