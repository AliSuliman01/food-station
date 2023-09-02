<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static AVAILABLE_TODAY()
 * @method static static POPULAR_PRODUCTS()
 * @method static static INGREDIENTS()
 */
final class CategoryEnum extends Enum
{
    const AVAILABLE_TODAY = 'AVAILABLE_TODAY';

    const POPULAR_PRODUCTS = 'POPULAR_PRODUCTS';

    const INGREDIENTS = 'INGREDIENTS';
}
