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
    public function getWarnings() : array;
=======
    /**
     * @return Warning[]
     */
    public function getWarnings(): array;
>>>>>>> 66597818 ( abdou a faire un poushe)
}
