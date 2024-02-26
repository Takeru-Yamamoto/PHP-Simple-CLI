<?php

namespace SimpleCli;

use SimpleCli\Interface\CommandInterface;

use SimpleCli\Trait\Common\Sapi;

use SimpleCli\Trait\Command\Config;
use SimpleCli\Trait\Command\Run;
use SimpleCli\Trait\Command\Application;
use SimpleCli\Trait\Command\Input;
use SimpleCli\Trait\Command\Output;
use SimpleCli\Trait\Command\ProgressBar;

/**
 * コマンドラインからの入力に応じた処理の実態を管理する基底クラス
 * 
 * @package SimpleCli
 */
abstract class BaseCommand implements CommandInterface
{
    use Sapi;

    use Config;
    use Run;
    use Application;
    use Input;
    use Output;
    use ProgressBar;
}
