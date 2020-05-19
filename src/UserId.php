<?php

namespace Raigu\XRoad\SoapEnvelope;

use Raigu\XRoad\SoapEnvelope\Element\AbstractElement;

/**
 * I am an user id of the person who initiates the X-Road request.
 *
 * I can inject myself into SOAP envelope header
 */
final class UserId extends AbstractElement
{
    /**
     * @param string $userId the user who is making the request
     *                   Format: {iso2LetterCountryCode}{personCode}
     *                   Example: EE0000000000
     */
    public function __construct(string $userId)
    {
        parent::__construct(
            new SoapHeaderElement(
                'userId',
                (new ValidatedUserId($userId))->asStr()
            )
        );
    }
}
