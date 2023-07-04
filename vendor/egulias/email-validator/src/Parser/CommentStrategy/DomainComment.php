<?php

namespace Egulias\EmailValidator\Parser\CommentStrategy;

use Egulias\EmailValidator\EmailLexer;
use Egulias\EmailValidator\Result\Result;
use Egulias\EmailValidator\Result\ValidEmail;
use Egulias\EmailValidator\Result\InvalidEmail;
use Egulias\EmailValidator\Result\Reason\ExpectingATEXT;

class DomainComment implements CommentStrategy
{
    public function exitCondition(EmailLexer $lexer, int $openedParenthesis): bool
    {
        if (($openedParenthesis === 0 && $lexer->isNextToken(EmailLexer::S_DOT))) { // || !$internalLexer->moveNext()) {
            return false;
        }

        return true;
    }

    public function endOfLoopValidations(EmailLexer $lexer): Result
    {
        //test for end of string
        if (!$lexer->isNextToken(EmailLexer::S_DOT)) {
<<<<<<< HEAD
<<<<<<< HEAD
            return new InvalidEmail(new ExpectingATEXT('DOT not found near CLOSEPARENTHESIS'), ((array) $lexer->token)['value']);
=======
            return new InvalidEmail(new ExpectingATEXT('DOT not found near CLOSEPARENTHESIS'), $lexer->current->value);
>>>>>>> 66597818 ( abdou a faire un poushe)
=======
            return new InvalidEmail(new ExpectingATEXT('DOT not found near CLOSEPARENTHESIS'), $lexer->current->value);
>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa
        }
        //add warning
        //Address is valid within the message but cannot be used unmodified for the envelope
        return new ValidEmail();
    }

    public function getWarnings(): array
    {
        return [];
    }
}
