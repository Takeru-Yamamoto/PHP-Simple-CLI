<?php

namespace SimpleCli\Proxy;

use StaticProxy\StaticProxy;

use SimpleCli\Proxy\ApplicationManager;

/**
 * ApplicationのProxy
 * ApplicationManagerのMethodをstaticに呼び出せるようにする
 * 
 * @package SimpleCli\Proxy
 * 
 * @method static \SimpleCli\Interface\ApplicationInterface make()
 * 
 * @method static void runCommand(\SimpleCli\Interface\CommandInterface $command, array<string|int, string|int> $argv)
 * 
 * @see \SimpleCli\Proxy\Interface\ManagerInterface
 */
class Application extends StaticProxy
{
    /** 
     * ApplicationManagerの実クラス名を取得する
     * 
     * @return string 
     */
    public static function getRealInstanceName(): string
    {
        return ApplicationManager::class;
    }
}
