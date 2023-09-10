<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class PermissionEnum extends Enum
{
    const CREATE_RESTAURANT = 'create_restaurant';

    const EDIT_RESTAURANT = 'edit_restaurant';

    const DELETE_RESTAURANT = 'delete_restaurant';

    const SHOW_RESTAURANT = 'show_restaurant';

    const ACCESS_RESTAURANT = 'access_restaurant';

    const CREATE_INGREDIENT = 'create_ingredient';

    const EDIT_INGREDIENT = 'edit_ingredient';

    const DELETE_INGREDIENT = 'delete_ingredient';

    const SHOW_INGREDIENT = 'show_ingredient';

    const ACCESS_INGREDIENT = 'access_ingredient';

    const CREATE_USER = 'create_user';

    const EDIT_USER = 'edit_user';

    const DELETE_USER = 'delete_user';

    const SHOW_USER = 'show_user';

    const ACCESS_USER = 'access_user';

    const CREATE_CATEGORY = 'create_category';

    const EDIT_CATEGORY = 'edit_category';

    const DELETE_CATEGORY = 'delete_category';

    const SHOW_CATEGORY = 'show_category';

    const ACCESS_CATEGORY = 'access_category';

    const CREATE_PRODUCT = 'create_product';

    const EDIT_PRODUCT = 'edit_product';

    const DELETE_PRODUCT = 'delete_product';

    const SHOW_PRODUCT = 'show_product';

    const ACCESS_PRODUCT = 'access_product';

    const CREATE_ORDER = 'create_order';

    const CREATE_CUSTOM_ORDER = 'create_custom_order';

    const EDIT_ORDER = 'edit_order';

    const DELETE_ORDER = 'delete_order';

    const SHOW_ORDER = 'show_order';

    const ACCESS_ORDER = 'access_order';
}
