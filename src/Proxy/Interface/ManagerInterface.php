<?php

namespace SimpleCli\Proxy\Interface;

use SimpleCli\Interface\ApplicationInterface;
use SimpleCli\Interface\CommandInterface;

/**
 * Proxyを経由してstaticにアクセスされるManagerのInterface
 * 
 * @package SimpleCli\Proxy\Interface
 */
interface ManagerInterface
{
    /**
     * Loggerのインスタンスを生成する
     *
     * @return \SimpleCli\Interface\ApplicationInterface
     */
    public function make(): ApplicationInterface;



    /*----------------------------------------*
     * Run Command
     *----------------------------------------*/

    /**
     * Commandを実行する
     *
     * @param \SimpleCli\Interface\CommandInterface $command
     * @param array<string|int, string|int> $argv
     * @return void
     */
    public function runCommand(CommandInterface $command, array $argv): void;
}
