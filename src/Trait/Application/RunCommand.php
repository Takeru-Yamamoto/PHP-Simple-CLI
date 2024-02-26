<?php

namespace SimpleCli\Trait\Application;

use SimpleCli\ArgvInput;

use SimpleCli\Command\ListCommand;
use SimpleCli\Command\CommandNotFoundCommand;

/**
 * Applicationクラスでのコマンドの実行処理を管理する
 * 
 * @package SimpleCli\Trait\Application
 * 
 * @property-read array<string, \SimpleCli\Interface\CommandInterface> $commands
 */
trait RunCommand
{
    /**
     * コマンドを実行する
     * 
     * @return void
     */
    public function run(): void
    {
        $input = new ArgvInput();

        $commandName = $input->commandName();

        $command = match (true) {
            isset($this->commands[$commandName]) => $this->commands[$commandName],

            empty($commandName) || $commandName === "list" => new ListCommand(),

            default => new CommandNotFoundCommand(),
        };

        $command->run($this, $input);
    }
}
