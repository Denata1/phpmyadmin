<?php
/**
 * phpinfo() wrapper to allow displaying only when configured to do so.
 */
declare(strict_types=1);

namespace PhpMyAdmin\Controllers;

use function phpinfo;
use const INFO_CONFIGURATION;
use const INFO_GENERAL;
use const INFO_MODULES;

/**
 * phpinfo() wrapper to allow displaying only when configured to do so.
 */
class PhpInfoController extends AbstractController
{
    public function index(): void
    {
        global $cfg;

        $this->response->disable();
        $this->response->getHeader()->sendHttpHeaders();

        if ($cfg['ShowPhpInfo']) {
            phpinfo(INFO_GENERAL | INFO_CONFIGURATION | INFO_MODULES);
        }
    }
}
