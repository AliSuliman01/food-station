<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static ROOT()
 * @method static static ADMIN()
 * @method static static CUSTOMER()
 * @method static static CHEF()
 */
final class RoleEnum extends Enum
{
    const ROOT = 'root';

    const ADMIN = 'admin';

    const CUSTOMER = 'customer';

    const CHEF = 'chef';
}
