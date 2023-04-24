<?php

namespace Nextend\SmartSlider3Pro\Generator\Common\ImagesInFolder;

use JURI;
use Nextend\Framework\ResourceTranslator\ResourceTranslator;
use Nextend\Framework\Url\Url;
use Nextend\SmartSlider3\Generator\AbstractGeneratorGroup;
use Nextend\SmartSlider3Pro\Generator\Common\ImagesInFolder\Sources\ImagesInFolderImages;
use Nextend\SmartSlider3Pro\Generator\Common\ImagesInFolder\Sources\ImagesInFolderSubfolders;
use Nextend\SmartSlider3Pro\Generator\Common\ImagesInFolder\Sources\ImagesInFolderVideos;

class GeneratorGroupImagesInFolder extends AbstractGeneratorGroup {

    protected $name = 'infolder';

    public function getLabel() {
        return n2_('Folder');
    }

    public function getDescription() {
        return sprintf(n2_('Creates slides from %1$s.'), n2_('Images in folder'));
    }

    protected function loadSources() {

        new ImagesInFolderImages($this, 'images', n2_('Images in folder'));
        new ImagesInFolderSubfolders($this, 'subfolders', n2_('Images in folder and subfolders'));
        new ImagesInFolderVideos($this, 'videos', n2_('Videos in folder'));
    }

    public static function trim($str, $addPathSeparator = true) {
        $str = ltrim(rtrim($str, '/'), '/');
        if ($addPathSeparator && strpos($str, ':') === false) {
            $str = DIRECTORY_SEPARATOR . $str;
        }

        return $str;
    }

    public static function fixSeparators($str) {
        return str_replace(array(
            '\\',
            '/'
        ), DIRECTORY_SEPARATOR, $str);
    }

    public static function pathToUri($path, $media_folder = true) {
        $path = self::fixSeparators(self::trim($path));
        $root = self::getRootPath();
        if (!empty($root) && !$media_folder) {
            $path = str_replace($root, '', $path);

            return self::getSiteUrl() . $path;
        } else if ($media_folder) {
            return ResourceTranslator::urlToResource(Url::pathToUri($path));
        } else {
            return Url::pathToUri($path);
        }
    }

    public static function getSiteUrl() {
        $site_url = get_site_url();

        if (empty($site_url)) {
            $site_url = (empty($_SERVER['HTTPS']) ? "http://" : "https://") . $_SERVER['HTTP_HOST'];
        }

        return self::fixSeparators(self::trim($site_url, false));
    }

    public static function getRootPath() {
        $root = '';
        $root = ABSPATH;

        if (!empty($root)) {
            $root = self::trim($root);
        }

        return $root;
    }

    public static function found($seachTerms, $string) {
        if (!empty($seachTerms[0])) {
            foreach ($seachTerms as $seachTerm) {
                if (strpos($string, $seachTerm) !== false) {
                    return true;
                }
            }

            return false;
        } else {
            return null;
        }
    }

    public static function asc($a, $b) {
        return (strtolower($b['title']) < strtolower($a['title']) ? 1 : -1);
    }

    public static function desc($a, $b) {
        return (strtolower($a['title']) < strtolower($b['title']) ? 1 : -1);
    }

    public static function orderByDate_asc($a, $b) {
        return ($b['created'] < $a['created'] ? 1 : -1);
    }

    public static function orderByDate_desc($a, $b) {
        return ($a['created'] < $b['created'] ? 1 : -1);
    }
}