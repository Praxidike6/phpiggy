<?php

declare(strict_types=1);

namespace Framework\Rules;

use InvalidArgumentException;

use Framework\Contracts\RuleInterface;

class MatchRule implements RuleInterface
{
    public function validate(array $data, string $field, array $params): bool
    {

        if (empty($params[0]))
        {
            throw new InvalidArgumentException("Field not specified");
        }

        return $data[$field] ===  $data[$params[0]];
    }

    public function getMessage(array $data, string $field, array $params): string
    {
        return "Does not match {$params[0]} field";
    }
}
