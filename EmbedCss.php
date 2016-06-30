<?php

namespace shqear\widgets;

use yii\widgets\Block;

class EmbedCss extends Block
{
    public function __set($name, $value)
    {
        $this->{$name} = $value;
    }

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
        $options = get_object_vars($this);

        foreach (['key', 'renderInPlace'] as $prop) {
            unset($options[$prop]);
        }
        $this->view->registerCss($block, $options, $key);
    }
}
