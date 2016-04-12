<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Functional\Spryker\Zed\StateMachine\Mocks;

use Generated\Shared\Transfer\StateMachineItemTransfer;
use Spryker\Zed\StateMachine\Dependency\Plugin\ConditionPluginInterface;

class TestConditionPlugin implements ConditionPluginInterface
{

    /**
     * @param StateMachineItemTransfer $stateMachineItemTransfer
     *
     * @return bool
     */
    public function check(StateMachineItemTransfer $stateMachineItemTransfer)
    {
        return true;
    }
}
