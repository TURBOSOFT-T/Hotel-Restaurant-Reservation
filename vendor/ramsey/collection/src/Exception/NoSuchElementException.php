<?php

/**
 * This file is part of the ramsey/collection library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Ben Ramsey <ben@benramsey.com>
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace Ramsey\Collection\Exception;

use RuntimeException;

/**
 * Thrown when attempting to access an element that does not exist.
 */
<<<<<<< HEAD
class NoSuchElementException extends RuntimeException
=======
class NoSuchElementException extends RuntimeException implements CollectionException
>>>>>>> 66597818 ( abdou a faire un poushe)
{
}
