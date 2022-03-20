<?php
    function carusel($feedURL, $IMG){
        $url = $feedURL; 
        $rss = simplexml_load_file($url);
        $item = $rss->channel->item;
        $link = $item->link;
        $title = $item->title;

        if($IMG == 0){          //extrae el link de la imagen
            $url_imagen = $item->guid;  
        }
        
        if($IMG == 1){
            if(is_array(($item->xpath('media:thumbnail')))){
                $mediaArray = $item->xpath('media:thumbnail');                                
                $media = end($mediaArray);                                              
                $url_imagen = $media->attributes()->url;
            }
        }

        if ($IMG == 2) {
            $url_imagen = $item->description;
            $url_imagen = extraerSRC($url_imagen,0);
        }

        if ($IMG == 3) {
            $url_imagen = $item->enclosure->attributes()->url;
        }

        if ($IMG == 4) {
            $url_imagen = $item->description;
            $url_imagen = extraerSRC($url_imagen,1);
        }

        if($IMG == 5){
            if(is_array(($item->xpath('media:content')))){
                $mediaArray = $item->xpath('media:content');                                
                $media = end($mediaArray);                                              
                $url_imagen = $media->attributes()->url;
            }
        }

        echo "
            <img src='" . $url_imagen . "' class='d-block w-100' alt='...'>
            <div class='carousel-caption d-none d-md-block text-light bg-dark'>
            <h5><a href='" . $link . "'>" . $title . "</a></h5>
            </div>
        ";
    }
?>