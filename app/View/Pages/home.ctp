<?
echo '<div class="container">';

echo '<div class="hero-carousel">';
foreach ($imageLinks as $imageLink) {
   echo '<img class="hero-image" src="/'.$imageLinks[0].'" style="display:none;">';
}
echo '</div>';
echo '</div>';

$options =['opt1' => 'Keuze 1', 'Keuze 2' => 'opt2'];

echo $this->Form->input('radio', array(
    'type' => 'radio',
    'options' => $options,
    'style'=> 'z-index:99999; left:80%;',
    'legend'=> 'Selecteer uw keuze',
    'div' => array('class' => 'input-wrapper', 'style' => 'position: absolute;')
));
?>
<script>
$(document).ready(function(){
    $('.hero-image').first().show();
});
</script>
