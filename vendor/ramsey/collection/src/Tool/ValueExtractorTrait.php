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

namespace Ramsey\Collection\Tool;

use Ramsey\Collection\Exception\InvalidPropertyOrMethod;
use Ramsey\Collection\Exception\UnsupportedOperationException;

<<<<<<< HEAD
<<<<<<< HEAD
use function get_class;
=======
use function is_array;
>>>>>>> 66597818 ( abdou a faire un poushe)
=======
use function is_array;
>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa
use function is_object;
use function method_exists;
use function property_exists;
use function sprintf;

/**
 * Provides functionality to extract the value of a property or method from an object.
 */
trait ValueExtractorTrait
{
    /**
     * Extracts the value of the given property, method, or array key from the
     * element.
     *
     * If `$propertyOrMethod` is `null`, we return the element as-is.
     *
     * @param mixed $element The element to extract the value from.
     * @param string | null $propertyOrMethod The property or method for which the
     *     value should be extracted.
     *
     * @return mixed the value extracted from the specified property, method,
     *     or array key, or the element itself.
     *
     * @throws InvalidPropertyOrMethod
     * @throws UnsupportedOperationException
     */
<<<<<<< HEAD
<<<<<<< HEAD
    // phpcs:ignore SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingNativeTypeHint
    protected function extractValue($object, string $propertyOrMethod)
=======
    protected function extractValue(mixed $element, ?string $propertyOrMethod): mixed
>>>>>>> 66597818 ( abdou a faire un poushe)
=======
    protected function extractValue(mixed $element, ?string $propertyOrMethod): mixed
>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa
    {
        if ($propertyOrMethod === null) {
            return $element;
        }

        if (!is_object($element) && !is_array($element)) {
            throw new UnsupportedOperationException(sprintf(
                'The collection type "%s" does not support the $propertyOrMethod parameter',
                $this->getType(),
            ));
        }

        if (is_array($element)) {
            return $element[$propertyOrMethod] ?? throw new InvalidPropertyOrMethod(sprintf(
                'Key or index "%s" not found in collection elements',
                $propertyOrMethod,
            ));
        }

<<<<<<< HEAD
<<<<<<< HEAD
        throw new ValueExtractionException(
            // phpcs:ignore SlevomatCodingStandard.Classes.ModernClassNameReference.ClassNameReferencedViaFunctionCall
            sprintf('Method or property "%s" not defined in %s', $propertyOrMethod, get_class($object)),
        );
=======
=======
>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa
        if (property_exists($element, $propertyOrMethod)) {
            return $element->$propertyOrMethod;
        }

        if (method_exists($element, $propertyOrMethod)) {
            return $element->{$propertyOrMethod}();
        }

        throw new InvalidPropertyOrMethod(sprintf(
            'Method or property "%s" not defined in %s',
            $propertyOrMethod,
            $element::class,
        ));
<<<<<<< HEAD
>>>>>>> 66597818 ( abdou a faire un poushe)
=======
>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa
    }
}
