<?php

namespace SimpleCli\Trait\Application;

use SimpleCli\Interface\CommandInterface;

/**
 * Applicationクラスにコマンドを追加する処理を管理する
 * 
 * @package SimpleCli\Trait\Application
 */
trait AddCommand
{
    /**
     * 追加されたコマンド一覧
     * 
     * @var array<string, \SimpleCli\Interface\CommandInterface>
     */
    protected array $commands = [];


    /**
     * コマンドを追加する
     * 
     * @param \SimpleCli\Interface\CommandInterface|string $command
     * @throws \RuntimeException
     * @return static
     */
    public function add(CommandInterface|string $command): static
    {
        if (is_string($command)) {
            $command = new $command();

            if (!($command instanceof CommandInterface)) throw new \RuntimeException("{$command} is not instance of CommandInterface");
        }

        $this->commands[$command->commandName()] = $command;

        return $this;
    }

    /**
     * 追加されたコマンド一覧を取得する
     * 
     * @return array<string, \SimpleCli\Interface\CommandInterface>
     */
    public function commands(): array
    {
        return $this->commands;
    }
}
