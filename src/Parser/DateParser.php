<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Sylius Sp. z o.o.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Sylius\GmvBundle\Parser;

final class DateParser implements DateParserInterface
{
    public function parseStartOfMonth(string $date): \DateTime
    {
        $dateTime = \DateTime::createFromFormat('m/Y', $date);

        if ($dateTime === false) {
            throw new \InvalidArgumentException('Invalid date format. Expected format: m/Y.');
        }

        return $dateTime->modify('first day of this month 00:00:00');
    }

    public function parseEndOfMonth(string $date): \DateTime
    {
        $dateTime = \DateTime::createFromFormat('m/Y', $date);

        if ($dateTime === false) {
            throw new \InvalidArgumentException('Invalid date format. Expected format: m/Y.');
        }

        return $dateTime->modify('last day of this month 23:59:59');
    }
}
