<?php

namespace Egulias\EmailValidator\Parser\CommentStrategy;

use Egulias\EmailValidator\EmailLexer;
use Egulias\EmailValidator\Result\Result;
use Egulias\EmailValidator\Warning\Warning;

interface CommentStrategy
{
    /**
     * Return "true" to continue, "false" to exit
     */
    public function exitCondition(EmailLexer $lexer, int $openedParenthesis): bool;

    public function endOfLoopValidations(EmailLexer $lexer): Result;

<<<<<<< HEAD
<<<<<<< HEAD
    public function getWarnings() : array;
=======
=======
>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa
    /**
     * @return Warning[]
     */
    public function getWarnings(): array;
<<<<<<< HEAD
>>>>>>> 66597818 ( abdou a faire un poushe)
=======
>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa
}
