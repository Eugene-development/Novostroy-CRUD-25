<?php

declare(strict_types=1);

namespace App\GraphQL\Scalars;

use GraphQL\Utils\Utils;
use GraphQL\Error\InvariantViolation;
use GraphQL\Language\AST\Node;
use GraphQL\Language\AST\StringValueNode;
use GraphQL\Error\Error;
use GraphQL\Type\Definition\ScalarType;

/** Read more about scalars here: https://webonyx.github.io/graphql-php/type-definitions/scalars. */
final class ULID extends ScalarType
{
    private function validateULID($value)
    {
        // ULID is 26 characters in Crockford's Base32 encoding
        $pattern = "/^[0-9A-HJKMNP-TV-Z]{26}$/i";

        return preg_match($pattern, $value);
    }

    /** Serializes an internal value to include in a response. */
    public function serialize($value)
    {
        if (!$this->validateULID($value)) {
            throw new InvariantViolation("Could not serialize following value as ULID: " . Utils::printSafe($value));
        }

        // Assuming the internal representation of the value is always correct
        return $value;
    }

    /** Parses an externally provided value (query variable) to use as an input. */
    public function parseValue($value)
    {
        if (!$this->validateULID($value)) {
            throw new InvariantViolation("Cannot represent following value as ULID: " . Utils::printSafe($value));
        }

        return $value;
    }

    /**
     * Parses an externally provided literal value (hardcoded in GraphQL query) to use as an input.
     *
     * Should throw an exception with a client friendly message on invalid value nodes, @see \GraphQL\Error\ClientAware.
     *
     * @param  \GraphQL\Language\AST\ValueNode&\GraphQL\Language\AST\Node  $valueNode
     * @param  array<string, mixed>|null  $variables
     */
    public function parseLiteral($valueNode, ?array $variables = null)
    {
        // Throw GraphQL\Error\Error vs \UnexpectedValueException to locate the error in the query
        if (!$valueNode instanceof StringValueNode) {
            throw new Error('Query error: Can only parse strings got: ' . $valueNode->kind, [$valueNode]);
        }

        if (!$this->validateULID($valueNode->value)) {
            throw new Error("Not a valid ULID", [$valueNode]);
        }

        return $valueNode->value;
    }
}
