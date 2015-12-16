<?php

/*
 * This file is part of the "supplyhog/linux-phantomjs" package.
 *
 * PhantomJs Version 1.9.8
 *
 * The content is released under the BSD License. Please view
 * the LICENSE file that was distributed with this source code.
 */

namespace LinuxInstaller;

use Composer\Script\Event;

class Installer
{
    /**
     * Operating system dependend installation of PhantomJS
     */
    public static function installPhantomJS(Event $event)
    {
        $composer = $event->getComposer();

        $composerBinDir = $composer->getConfig()->get('bin-dir');
        if (!is_dir($composerBinDir)) {
            mkdir($composerBinDir);
        }

        $sourceName = '/bin/phantomjs';
        $targetName = $composerBinDir . '/phantomjs';

        if ($os !== 'unknown') {
            copy(self::PHANTOMJS_TARGETDIR . $sourceName, $targetName);
            chmod($targetName, 0755);
        }
    }
}
