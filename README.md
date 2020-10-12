laravel-admin extension 商品 SKU
======
![预览](./many.png?raw=true)
![预览](./single.png?raw=true)

## 安装
```bash
composer require fingerqin/sku
php artisan vendor:publish --provider="FingerQin\Sku\SkuServiceProvider"
```

## 配置

### 配置sku上传地址
文件路径【public/vendor/fingerqin/sku/sku.js】
```javascript
const UploadHost = '/admin/upload_file';
```
php进行存储
```php
// key为file
if($request->hasFile('file')) {
    $file = $request->file('file');
    $path = $file->store('images');

    // 返回格式
    return ['url'=> Storage::url($path)];
}
```

### 数据库表字段配置
- 数据类型 json 或字符串




### 使用方法
```php
$form->sku('sku','商品SKU');
```

### 其他说明
本扩展只会将SKU数据写指定的字段中，如需个性化处理数据，请在【表单回调】中处理

原始数据
```json
{
	"type": "many", // many多规格；single单规格
	"attrs": {"尺寸": ["XL", "XXL", "XXXL"], "颜色": ["黑", "灰色"]},
    "sku": [{"pic": "", "price": "89", "stock": "100", "尺寸": "XL", "颜色": "黑"}, {
        "pic": "",
        "price": "89",
        "stock": "100",
        "尺寸": "XL",
        "颜色": "灰色"
    }, {"pic": "", "price": "89", "stock": "100", "尺寸": "XXL", "颜色": "黑"}, {
        "pic": "",
        "price": "89",
        "stock": "100",
        "尺寸": "XXL",
        "颜色": "灰色"
    }, {"pic": "", "price": "89", "stock": "100", "尺寸": "XXXL", "颜色": "黑"}, {
        "pic": "",
        "price": "89",
        "stock": "100",
        "尺寸": "XXXL",
        "颜色": "灰色"
    }]
}
```

```php
$form->sku('sku','商品SKU');

// 处理数据
$form->saving(function($form) {
    dd($form->sku);
});
```



该扩展从 `https://github.com/jade-kun/sku` 基本上修改。感谢原作者的付出。由于原作者不再维护，以及原扩展只支持多规格，不支持单规格。所以，我在此基本上做了优化。同时支持单规格与多规格的修改。



