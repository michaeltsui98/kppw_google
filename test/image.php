<?php define ( 'IN_KEKE', TRUE );

include '../app_boot.php';



//生成水印
$mark = Image::factory(S_ROOT.'test/crop_form.jpg');

$image = Image::factory(S_ROOT.'test/dynamic-600.jpg');

//重置大小
//$mark->resize($image->width,$image->height);

//$mark->crop($width, $height);
//水印
//$image->watermark($mark,NULL,NULL,50)->save('watermark.jpg');
//载剪
// $image->crop(100, 100)->save('watermark.jpg');

//水平,垂直翻转
//$image->flip(Image::VERTICAL)->save('watermark.jpg');
//倒映
//$image->reflection($image->height,50,TRUE);
//锐化
//$image->sharpen(50);
//旋转
//$image->rotate(180);
$image->resize(100,100);

$image->save('watermark100.jpg');

echo "<img src='watermark100.jpg'>";


