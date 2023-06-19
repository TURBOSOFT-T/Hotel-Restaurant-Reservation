<?php

namespace Egulias\EmailValidator\Parser;

use Egulias\EmailValidator\EmailLexer;
use Egulias\EmailValidator\Result\Result;
use Egulias\EmailValidator\Result\ValidEmail;
use Egulias\EmailValidator\Result\InvalidEmail;
use Egulias\EmailValidator\Result\Reason\ExpectingATEXT;

class IDRightPart extends DomainPart
{
    protected function validateTokens(bool $hasComments): Result
    {
        $invalidDomainTokens = [
            EmailLexer::S_DQUOTE => true,
            EmailLexer::S_SQUOTE => true,
            EmailLexer::S_BACKTICK => true,
            EmailLexer::S_SEMICOLON => true,
            EmailLexer::S_GREATERTHAN => true,
            EmailLexer::S_LOWERTHAN => true,
        ];

<<<<<<< HEAD
        if (isset($invalidDomainTokens[((array) $this->lexer->token)['type']])) {
            return new InvalidEmail(new ExpectingATEXT('Invalid token in domain: ' . ((array) $this->lexer->token)['value']), ((array) $this->lexer->token)['value']);
=======
        if (isset($invalidDomainTokens[$this->lexer->current->type])) {
            return new InvalidEmail(new ExpectingATEXT('Invalid token in domain: ' . $this->lexer->current->value), $this->lexer->current->value);
>>>>>>> 66597818 ( abdou a faire un poushe)
        }
        return new ValidEmail();
    }
}
