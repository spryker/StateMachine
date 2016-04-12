<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Functional\Spryker\Zed\StateMachine\Mocks;

use Generated\Shared\Transfer\StateMachineItemTransfer;
use Pyz\Zed\StateMachineExample\Communication\Plugin\Command\TestCommandPlugin;
use Spryker\Zed\StateMachine\Dependency\Plugin\CommandPluginInterface;
use Spryker\Zed\StateMachine\Dependency\Plugin\ConditionPluginInterface;
use Spryker\Zed\StateMachine\Dependency\Plugin\StateMachineHandlerInterface;

class TestStateMachineHandler implements StateMachineHandlerInterface
{
    /**
     * @var StateMachineItemTransfer
     */
    protected $itemStateUpdated;

    /**
     * @var StateMachineItemTransfer[]
     */
    protected $stateMachineItemsByStateIds;

    /**
     * List of command plugins for this state machine for all processes.
     *
     * @return array|CommandPluginInterface[]
     */
    public function getCommandPlugins()
    {
        return [
            'Test/Command' => new TestCommandPlugin(),
        ];
    }

    /**
     * List of condition plugins for this state machine for all processes.
     *
     * @return array|ConditionPluginInterface[]
     */
    public function getConditionPlugins()
    {
        return [
            'Test/Condition' => new TestConditionPlugin(),
        ];
    }

    /**
     * Name of state machine used by this handler.
     *
     * @return string
     */
    public function getStateMachineName()
    {
        return 'Test';
    }

    /**
     * List of active processes used for this state machine
     *
     * @return string[]
     */
    public function getActiveProcesses()
    {
       return [
          'TestProcess',
       ];
    }

    /**
     * Provide initial state name for item when state machine initialized. Useing proces name.
     *
     * @param string $processName
     *
     * @return string
     */
    public function getInitialStateForProcess($processName)
    {
        return 'new';
    }

    /**
     * This method is called when state of item was changed, client can create custom logic for example update it's related table with new state id/name.
     * StateMachineItemTransfer:identifier is id of entity from implementor.
     *
     * @param StateMachineItemTransfer $stateMachineItemTransfer
     *
     * @return bool
     */
    public function itemStateUpdated(StateMachineItemTransfer $stateMachineItemTransfer)
    {
        $this->itemStateUpdated = $stateMachineItemTransfer;
    }

    /**
     * This method should return all item identifiers which are in passed state ids.
     *
     * @param array $stateIds
     *
     * @return StateMachineItemTransfer[]
     */
    public function getStateMachineItemsByStateIds($stateIds = [])
    {
        return $this->stateMachineItemsByStateIds;
    }

    /**
     * @return StateMachineItemTransfer
     */
    public function getItemStateUpdated()
    {
        return $this->itemStateUpdated;
    }

    /**
     * @param \Generated\Shared\Transfer\StateMachineItemTransfer[] $stateMachineItemsByStateIds
     */
    public function setStateMachineItemsByStateIds(array $stateMachineItemsByStateIds)
    {
        $this->stateMachineItemsByStateIds = $stateMachineItemsByStateIds;
    }
}
