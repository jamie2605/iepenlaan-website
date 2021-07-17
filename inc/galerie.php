<script type="text/javascript" src="fancybox/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />

<script type="text/javascript">
    $(document).ready(function() {
        /*
         *  Simple image gallery. Uses default settings
         */

        $('.gallery-image').fancybox();
    });
</script>

<div class="container main-content">
    <div class="row row-space">
    <?php
        $iteration = 1;	
        foreach(array_merge(glob('gallery/*.JPG'), glob('gallery/*.jpg'), glob('gallery/*.jpeg')) as $img){
            // create thumbnails on the fly if don't exist (first call slow)
            $name = basename($img);

            if(!file_exists('gallery/small/'.$name)){
                $source = imagecreatefromjpeg($img);
                $scaled = imagescale($source, 600, 400);
                imagejpeg($scaled, 'gallery/small/'.$name);

            }
            if(!file_exists('gallery/medium/'.$name)){
                $source = imagecreatefromjpeg($img);
                $scaled = imagescale($source, 2400, 1600);
                imagejpeg($scaled, 'gallery/medium/'.$name);
            }

            echo "<div class=\"col-sm-4\">
                    <a class=\"gallery-image\" href=\"gallery/medium/".$name."\"
                       data-fancybox-group=\"gallery\"";

            $desc_file = 'gallery/'.$name.'.txt';

            if(file_exists($desc_file)){
                $myfile = fopen($desc_file, "r") or die("Unable to open file!");
                $description = fread($myfile,filesize($desc_file));
                fclose($myfile);

                echo "title='".$description."'";
            }

            echo "><img class=\"img-responsive img-rounded\" src=\"gallery/small/".$name."\" alt=\"\" />
                    </a>
                </div>";
            if($iteration % 3 == 0){
                echo "</div><div class='row row-space'>";
            }
            $iteration++;
        }

    ?>
    </div>
</div>