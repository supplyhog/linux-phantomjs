<?php

/*
 * This file is part of the "supplyhog/linux-phantomjs" package.
 *
 * PhantomJs Version 1.9.8
 *
 * The content is released under the BSD License. Please view
 * the LICENSE file that was distributed with this source code.
 */

namespace LinuxPhantom;

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

        $sourceName = __DIR__ . '/bin/phantomjs';
        $targetName = $composerBinDir . '/phantomjs';
        link($targetName, $sourceName);
        chmod($targetName, 0755);
    }
}
