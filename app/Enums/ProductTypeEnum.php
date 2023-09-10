<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static PERSONAL()
 * @method static static PUBLIC()
 */
final class ProductTypeEnum extends Enum
{
    const PERSONAL = 'personal';

    const PUBLIC = 'public';
}
