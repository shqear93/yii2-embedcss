<?php

namespace shqear\widgets;

use yii\widgets\Block;

class EmbedCss extends Block
{
    public $key;

    /**
     * @param array|integer $config array or block depends constant
     * @return void|static
     */
    static function begin($config = [])
    {
        parent::begin($config);
    }

    /**
     * @return string|void
     */
    public function run()
    {
        $block = ob_get_clean();

        $block = trim($block);

        $cssBlockPattern = '|^<style[^>]*>(?P<block_content>.+?)</style>$|is';
        if (preg_match($cssBlockPattern, $block, $matches)) {
            $block = $matches['block_content'];
        }

        $key = (empty($this->key)) ? md5($block) : $this->key;

        $this->view->registerCss($block, get_object_vars($this), $key);
    }
}
