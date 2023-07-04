<?php

namespace Egulias\EmailValidator\Parser;

use Egulias\EmailValidator\Result\Result;
use Egulias\EmailValidator\Result\InvalidEmail;
use Egulias\EmailValidator\Result\Reason\CommentsInIDRight;

class IDLeftPart extends LocalPart
{
    protected function parseComments(): Result
    {
<<<<<<< HEAD
<<<<<<< HEAD
       return new InvalidEmail(new CommentsInIDRight(), ((array) $this->lexer->token)['value']);
=======
        return new InvalidEmail(new CommentsInIDRight(), $this->lexer->current->value);
>>>>>>> 66597818 ( abdou a faire un poushe)
=======
        return new InvalidEmail(new CommentsInIDRight(), $this->lexer->current->value);
>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa
    }
}
