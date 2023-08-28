<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OPEN()
 * @method static static SERVING_QUEUE()
 * @method static static SERVING()
 * @method static static DELIVERING_QUEUE()
 * @method static static CANCELED()
 * @method static static PAID()
 */
final class OrderStatusEnum extends Enum
{
    const OPEN = 'open';

    const SERVING_QUEUE = 'serving_queue';

    const IN_SERVE = 'in_serve';

    const DELIVERING_QUEUE = 'delivering_queue';

    const CANCELED = 'canceled';

    const PAID = 'paid';
}
