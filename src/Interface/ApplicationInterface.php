<?php

namespace SimpleCli\Interface;

/**
 * ApplicationのInterface
 * 
 * @package SimpleCli\Interface
 */
interface ApplicationInterface
{
    /*----------------------------------------*
     * AddCommand
     *----------------------------------------*/

    /**
     * コマンドを追加する
     * 
     * @param \SimpleCli\Interface\CommandInterface|string $command
     * @throws \RuntimeException
     * @return static
     */
    public function add(CommandInterface|string $command): static;

    /**
     * 追加されたコマンド一覧を取得する
     * 
     * @return array<string, \SimpleCli\Interface\CommandInterface>
     */
    public function commands(): array;



    /*----------------------------------------*
     * RunCommand
     *----------------------------------------*/

    /**
     * コマンドを実行する
     * 
     * @return void
     */
    public function run(): void;
}
