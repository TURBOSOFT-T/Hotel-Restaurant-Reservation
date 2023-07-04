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
 * Thrown when attempting to operate on collections of differing types.
 */
<<<<<<< HEAD
<<<<<<< HEAD
class CollectionMismatchException extends RuntimeException
=======
class CollectionMismatchException extends RuntimeException implements CollectionException
>>>>>>> 66597818 ( abdou a faire un poushe)
=======
class CollectionMismatchException extends RuntimeException implements CollectionException
>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa
{
}
