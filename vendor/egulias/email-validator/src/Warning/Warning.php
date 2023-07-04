<?php

namespace Egulias\EmailValidator\Warning;

abstract class Warning
{
<<<<<<< HEAD
<<<<<<< HEAD
=======
    /**
     * @var int CODE
     */
>>>>>>> 66597818 ( abdou a faire un poushe)
=======
    /**
     * @var int CODE
     */
>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa
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
<<<<<<< HEAD
        return $this->message() . " rfc: " .  $this->rfcNumber . "internal code: " . static::CODE;
=======
        return $this->message() . " rfc: " .  $this->rfcNumber . "internal code: " . strval(static::CODE);
>>>>>>> 66597818 ( abdou a faire un poushe)
=======
        return $this->message() . " rfc: " .  $this->rfcNumber . "internal code: " . strval(static::CODE);
>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa
    }
}
