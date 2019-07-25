<?php

function toSkin($img, $size, $iscolored=false, $twosided=false, $output='out')
{
    $height = $size[1];
    $width = $size[0];


    $output_name = $output  . '_' . time() . '.png';
	
	$thumb=imagecreatetruecolor(16, 32);
	
	imagecopyresized($thumb,$img,0,0,0,0,16,32,$width,$height);
	
	for($i=0; $i<8; $i++){
		for($j=0; $j<4; $j++){
			imagesetpixel($thumb,$j,$i,imagecolorallocate($thumb,255,255,255));
		}
	}
	
	for($i=0; $i<8; $i++){
		for($j=12; $j<16; $j++){
			imagesetpixel($thumb,$j,$i,imagecolorallocate($thumb,255,255,255));
		}
	}
	
	for($i=20; $i<33; $i++){
		for($j=0; $j<4; $j++){
			imagesetpixel($thumb,$j,$i,imagecolorallocate($thumb,255,255,255));
		}
	}
	
	for($i=20; $i<33; $i++){
		for($j=12; $j<16; $j++){
			imagesetpixel($thumb,$j,$i,imagecolorallocate($thumb,255,255,255));
		}
	}
	
	
	if($iscolored)
		$temp = imagecreatefrompng('coloredskin.png');
	else
		$temp = imagecreatefrompng('blackskin.png');
	
	imagecolortransparent($temp, imagecolorallocate($temp, 0, 0, 0));
	
	imagecopy($temp,$thumb,40,8,4,0,8,8);
	imagecopy($temp,$thumb,20,36,4,8,8,12);
	imagecopy($temp,$thumb,44,36,0,8,4,12);
	imagecopy($temp,$thumb,52,52,12,8,4,12);
	imagecopy($temp,$thumb,4,36,4,20,4,12);
	imagecopy($temp,$thumb,4,52,8,20,4,12);
	
	if($twosided){
		imagecopy($temp,$thumb,56,8,4,0,8,8);
		imagecopy($temp,$thumb,32,36,4,8,8,12);
		imagecopy($temp,$thumb,60,52,0,8,4,12);
		imagecopy($temp,$thumb,52,36,12,8,4,12);
		imagecopy($temp,$thumb,12,52,4,20,4,12);
		imagecopy($temp,$thumb,12,36,8,20,4,12);
	}
	
    imagepng($thumb, 'last.png');
	imagepng($temp, 'saved/'.$output_name);
	
	echo '<a href="saved/'.$output_name.'">Download the skin!</a>';
	
    imagedestroy($thumb); 
	imagedestroy($img);
	imagedestroy($temp);
	

}



?>
