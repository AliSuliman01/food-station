<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static EN()
 * @method static static AR()
 * @method static static TR()
 */
final class LanguageCodesEnum extends Enum
{
    const EN = 'en';

    const AR = 'ar';

    const TR = 'tr';

}
