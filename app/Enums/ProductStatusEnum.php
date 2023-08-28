<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static ACTIVE()
 * @method static static BLOCKED()
 */
final class ProductStatusEnum extends Enum
{
    const ACTIVE = 'active';
    const BLOCKED = 'blocked';
}
