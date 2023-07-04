<?php

namespace Egulias\EmailValidator\Parser;

use Egulias\EmailValidator\EmailLexer;
use Egulias\EmailValidator\Warning\CFWSNearAt;
use Egulias\EmailValidator\Result\InvalidEmail;
use Egulias\EmailValidator\Warning\CFWSWithFWS;
use Egulias\EmailValidator\Result\Reason\CRNoLF;
use Egulias\EmailValidator\Result\Reason\AtextAfterCFWS;
use Egulias\EmailValidator\Result\Reason\CRLFAtTheEnd;
use Egulias\EmailValidator\Result\Reason\CRLFX2;
use Egulias\EmailValidator\Result\Reason\ExpectingCTEXT;
use Egulias\EmailValidator\Result\Result;
use Egulias\EmailValidator\Result\ValidEmail;

class  FoldingWhiteSpace extends PartParser
{
    public const FWS_TYPES = [
        EmailLexer::S_SP,
        EmailLexer::S_HTAB,
        EmailLexer::S_CR,
        EmailLexer::S_LF,
        EmailLexer::CRLF
    ];

<<<<<<< HEAD
<<<<<<< HEAD
    public function parse() : Result
=======
    public function parse(): Result
>>>>>>> 66597818 ( abdou a faire un poushe)
=======
    public function parse(): Result
>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa
    {
        if (!$this->isFWS()) {
            return new ValidEmail();
        }

        $previous = $this->lexer->getPrevious();

        $resultCRLF = $this->checkCRLFInFWS();
        if ($resultCRLF->isInvalid()) {
            return $resultCRLF;
        }

<<<<<<< HEAD
<<<<<<< HEAD
        if (((array) $this->lexer->token)['type'] === EmailLexer::S_CR) {
            return new InvalidEmail(new CRNoLF(), ((array) $this->lexer->token)['value']);
        }

        if ($this->lexer->isNextToken(EmailLexer::GENERIC) && $previous['type']  !== EmailLexer::S_AT) {
            return new InvalidEmail(new AtextAfterCFWS(), ((array) $this->lexer->token)['value']);
        }

        if (((array) $this->lexer->token)['type'] === EmailLexer::S_LF || ((array) $this->lexer->token)['type'] === EmailLexer::C_NUL) {
            return new InvalidEmail(new ExpectingCTEXT(), ((array) $this->lexer->token)['value']);
=======
        if ($this->lexer->current->isA(EmailLexer::S_CR)) {
            return new InvalidEmail(new CRNoLF(), $this->lexer->current->value);
        }

        if ($this->lexer->isNextToken(EmailLexer::GENERIC) && !$previous->isA(EmailLexer::S_AT)) {
            return new InvalidEmail(new AtextAfterCFWS(), $this->lexer->current->value);
        }

        if ($this->lexer->current->isA(EmailLexer::S_LF) || $this->lexer->current->isA(EmailLexer::C_NUL)) {
            return new InvalidEmail(new ExpectingCTEXT(), $this->lexer->current->value);
>>>>>>> 66597818 ( abdou a faire un poushe)
        }

=======
        if ($this->lexer->current->isA(EmailLexer::S_CR)) {
            return new InvalidEmail(new CRNoLF(), $this->lexer->current->value);
        }

        if ($this->lexer->isNextToken(EmailLexer::GENERIC) && !$previous->isA(EmailLexer::S_AT)) {
            return new InvalidEmail(new AtextAfterCFWS(), $this->lexer->current->value);
        }

        if ($this->lexer->current->isA(EmailLexer::S_LF) || $this->lexer->current->isA(EmailLexer::C_NUL)) {
            return new InvalidEmail(new ExpectingCTEXT(), $this->lexer->current->value);
        }

>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa
        if ($this->lexer->isNextToken(EmailLexer::S_AT) || $previous->isA(EmailLexer::S_AT)) {
            $this->warnings[CFWSNearAt::CODE] = new CFWSNearAt();
        } else {
            $this->warnings[CFWSWithFWS::CODE] = new CFWSWithFWS();
        }

        return new ValidEmail();
    }

    protected function checkCRLFInFWS(): Result
    {
<<<<<<< HEAD
<<<<<<< HEAD
        if (((array) $this->lexer->token)['type'] !== EmailLexer::CRLF) {
=======
        if (!$this->lexer->current->isA(EmailLexer::CRLF)) {
>>>>>>> 66597818 ( abdou a faire un poushe)
=======
        if (!$this->lexer->current->isA(EmailLexer::CRLF)) {
>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa
            return new ValidEmail();
        }

        if (!$this->lexer->isNextTokenAny(array(EmailLexer::S_SP, EmailLexer::S_HTAB))) {
<<<<<<< HEAD
<<<<<<< HEAD
            return new InvalidEmail(new CRLFX2(), ((array) $this->lexer->token)['value']);
=======
            return new InvalidEmail(new CRLFX2(), $this->lexer->current->value);
>>>>>>> 66597818 ( abdou a faire un poushe)
=======
            return new InvalidEmail(new CRLFX2(), $this->lexer->current->value);
>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa
        }

        //this has no coverage. Condition is repeated from above one
        if (!$this->lexer->isNextTokenAny(array(EmailLexer::S_SP, EmailLexer::S_HTAB))) {
<<<<<<< HEAD
<<<<<<< HEAD
            return new InvalidEmail(new CRLFAtTheEnd(), ((array) $this->lexer->token)['value']);
=======
            return new InvalidEmail(new CRLFAtTheEnd(), $this->lexer->current->value);
>>>>>>> 66597818 ( abdou a faire un poushe)
=======
            return new InvalidEmail(new CRLFAtTheEnd(), $this->lexer->current->value);
>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa
        }

        return new ValidEmail();
    }

<<<<<<< HEAD
<<<<<<< HEAD
    protected function isFWS() : bool
=======
    protected function isFWS(): bool
>>>>>>> 66597818 ( abdou a faire un poushe)
=======
    protected function isFWS(): bool
>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa
    {
        if ($this->escaped()) {
            return false;
        }

<<<<<<< HEAD
<<<<<<< HEAD
        return in_array(((array) $this->lexer->token)['type'], self::FWS_TYPES);
=======
        return in_array($this->lexer->current->type, self::FWS_TYPES);
>>>>>>> 66597818 ( abdou a faire un poushe)
=======
        return in_array($this->lexer->current->type, self::FWS_TYPES);
>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa
    }
}
