<?php

namespace SimpleCli\Trait\Command;

use SimpleCli\Interface\ApplicationInterface;

/**
 * 受け取ったApplicationを管理する
 * 
 * @package SimpleCli\Trait\Command
 */
trait Application
{
    /**
     * 受け取ったApplication
     * 
     * @var \SimpleCli\Interface\ApplicationInterface
     */
    private ApplicationInterface $application;


    /**
     * Applicationをセットする
     * 
     * @param \SimpleCli\Interface\ApplicationInterface $application
     * @return void
     */
    protected function setApplication(ApplicationInterface $application): void
    {
        $this->application = $application;
    }

    /**
     * Applicationを取得する
     * 
     * @return \SimpleCli\Interface\ApplicationInterface
     */
    protected function application(): ApplicationInterface
    {
        return $this->application;
    }
}
