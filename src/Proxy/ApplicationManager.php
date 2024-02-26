<?php

namespace SimpleCli\Proxy;

use SimpleCli\Proxy\Interface\ManagerInterface;

use SimpleCli\Application;
use SimpleCli\ArgvInput;
use SimpleCli\Interface\CommandInterface;

/**
 * Proxyを経由してstaticにアクセスされるManager
 * 
 * @package SimpleLogger\Proxy
 */
class ApplicationManager implements ManagerInterface
{
    /**
     * Loggerのインスタンスを生成する
     *
     * @return \SimpleCli\Application
     */
    public function make(): Application
    {
        return new Application();
    }



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
    public function runCommand(CommandInterface $command, array $argv): void
    {
        $input = new ArgvInput($this->parseArgv($command, $argv));

        $application = $this->make();

        $application->add($command);

        $command->run($application, $input);
    }

    /**
     * argvをパースする
     * 
     * @param \SimpleCli\Interface\CommandInterface $command
     * @param array<string|int, string|int> $argv
     * @return array<string>
     */
    protected function parseArgv(CommandInterface $command, array $argv): array
    {
        $parsedArgv = [
            basename($this::class),
            $command->commandName()
        ];

        foreach ($argv as $key => $value) {
            if (is_string($key)) {
                $parsedArgv[] = "--{$key}";
                $parsedArgv[] = $value;
            } else {
                $parsedArgv[] = $value;
            }
        }

        return $parsedArgv;
    }
}
