<?php

namespace SimpleCli\Command;

use SimpleCli\BaseCommand;

/**
 * コマンド名が見つからなかった場合の処理
 * 
 * @package SimpleCli\Command
 */
class CommandNotFoundCommand extends BaseCommand
{
    /**
     * コマンド名
     * 
     * @var string
     */
    protected string $commandName = "command-not-found";

    /**
     * コマンドの説明文
     * 
     * @var string
     */
    protected string $description = "コマンドラインにエラーメッセージを表示する";


    /**
     * 実行する処理
     * 
     * @return void
     */
    protected function execute(): void
    {
        $commandName = $this->input()->commandName();
        $arguments   = json_encode($this->input()->arguments(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        $this->output("Command not found.");
        $this->output("Command Name\t{$commandName}");
        $this->output("Arguments\t{$arguments}");
    }
}
