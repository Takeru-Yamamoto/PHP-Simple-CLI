<?php

namespace SimpleCli\Command;

use SimpleCli\BaseCommand;

/**
 * Applicationクラスで定義されているコマンドと対応する処理を管理する
 * 
 * @package SimpleCli\Command
 */
class ListCommand extends BaseCommand
{
    /**
     * コマンド名
     * 
     * @var string
     */
    protected string $commandName = "list";

    /**
     * コマンドの説明文
     * 
     * @var string
     */
    protected string $description = "登録されているコマンド一覧を表示する";


    /**
     * 実行する処理
     * 
     * @return void
     */
    protected function execute(): void
    {
        $this->output("Registered commands:");

        foreach ($this->application()->commands() as $command) {
            $this->output("\t{$command->commandName()}\t{$command->description()}");
        }
    }
}
