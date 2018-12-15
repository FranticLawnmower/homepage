<?
echo '<div class="container">';
foreach($items as $array) {
    pr($array);
    die();
    $item = $array['Item'];
    echo '<div class="item-container">';
    if(!empty($array['File'])) {
        foreach($array['File'] as $file) {
            $image_array[] = $file['link'];
            $background_url = $file['link'];
            echo '<div class="item-image" style="background-image:url('.$file['link'].')"></div>';
        }
    }
    echo '<div class="item-text"><h4>'.$item['subject'].'</h4>'.
    '<div class="text">'.$item['description'].'</div></div>'.
    '</div>';
}
echo '</div>';
?>
