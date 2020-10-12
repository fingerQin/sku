<?php

namespace FingerQin\Sku;

use Encore\Admin\Form\Field;

class SkuField extends Field
{
    protected $view = 'sku::sku_field';

    protected static $js = [
        'vendor/fingerqin/sku/sku.js'
    ];

    protected static $css = [
        'vendor/fingerqin/sku/sku.css'
    ];

    public function render()
    {

        $this->script = <<< EOF
window.DemoSku = new FingerQinSKU('{$this->getElementClassSelector()}')
EOF;
        return parent::render();
    }

}
