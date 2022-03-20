<?php
    function XBOX($cadena) {
        if (preg_match('@XBOX@', $cadena) or preg_match('@Xbox@', $cadena)) {
            return true;
        }
        return false;
    }

    function extraerSRC($cadena,$Preg) {
        if ($Preg == 0) {
            preg_match('@target="_blank"><img src="([^"]+)"@', $cadena, $array);
        } else {
            preg_match('@src="([^"]+)"@', $cadena, $array);
        }
        $src = array_pop($array);
        return $src;
    }

    function feed($feedURL, $IMG){
        $i = 0; 
        $url = $feedURL; 
        $rss = simplexml_load_file($url); 
        foreach($rss->channel->item as $item) { 
            $link = $item->link;  //extrae el link
            $title = $item->title;  //extrae el titulo
            $date = $item->pubDate;  //extrae la fecha

            $description = strip_tags($item->description);  //extrae la descriXBOXion
            $description2 = strip_tags($item->description);  //extrae la descriXBOXion

            if (strlen($description) > 100) { //limita la descriXBOXion a 200 caracteres
                $stringCut = substr($description, 0, 100);                   
                $description = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
            }
            
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
            if (XBOX($title) or XBOX($description2)) {
                echo "
                    <div class='col'  id='". $i ."'>
                        <div class='card h-100'>
                            <img src='" . $url_imagen . "' class='card-img-top' alt='...'  width='304' height='200'>
                            <div class='card-body d-flex flex-column'>
                                <h5 class='card-title'>" . $title . "</h5>
                                <p class='card-text'>" .  $description . "</p>
                                <a href='" . $link . "' class='mt-auto btn btn-primary' style='margin-right: 150px;'>Leer mas...</a>
                            </div>
                            <div class='card-footer'>
                                <small class='text-muted'>" . $date . "</small>
                            </div>
                        </div>
                    </div>"
                ;
            }
        }
    }
?>