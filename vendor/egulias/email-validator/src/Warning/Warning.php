<?php

namespace Egulias\EmailValidator\Warning;

abstract class Warning
{
<<<<<<< HEAD
=======
    /**
     * @var int CODE
     */
>>>>>>> 66597818 ( abdou a faire un poushe)
    public const CODE = 0;

    /**
     * @var string
     */
    protected $message = '';

    /**
     * @var int
     */
    protected $rfcNumber = 0;

    /**
     * @return string
     */
    public function message()
    {
        return $this->message;
    }

    /**
     * @return int
     */
    public function code()
    {
        return self::CODE;
    }

    /**
     * @return int
     */
    public function RFCNumber()
    {
        return $this->rfcNumber;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
<<<<<<< HEAD
        return $this->message() . " rfc: " .  $this->rfcNumber . "internal code: " . static::CODE;
=======
        return $this->message() . " rfc: " .  $this->rfcNumber . "internal code: " . strval(static::CODE);
>>>>>>> 66597818 ( abdou a faire un poushe)
    }
}
