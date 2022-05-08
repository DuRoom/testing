<?php

/*
 * This file is part of duroom/testing-tests.
 *
 * Copyright (c) 2021 .
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace DuRoom\Testing;

use DuRoom\Extend;

return [
    (new Extend\Settings)->serializeToForum('notARealSetting', 'not.a.real.setting'),
    (new Extend\Frontend('forum'))->route('/added-by-extension', 'added-by-extension')
];