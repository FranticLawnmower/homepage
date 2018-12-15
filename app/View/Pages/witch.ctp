<style>
.witch {
    height: 20%;
    
}
#screen {
    position: absolute;
    left: 5px;
    top: 5px;
}
</style>
<?

//echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/svg.js/2.6.3/svg.js"></script>';
echo $this->element('witch_svg');

echo '<div class="svg_container"><svg title="iets_anders" class="witch" viewBox="0 0 78.834 130.667">'.
'<use id="screen" xlink:href="#witch-3" style="display:none;">'.
'</use>'.
'</svg></div>';
 
?>
<div id="drawing">
</div>
<canvas id="background" width="600" height="360">
</canvas>
<script type="text/javascript">
var frames = $('#witch symbol');
//let showframe;
//algemene functie maken om een animatieframe te krijgen. ipv showframe.id
var element = document.getElementsByTagName('use')[0];
console.log(element);
const delay = 250;
function animate(frame, stopframe) {
    if(frame == undefined || frame >=4) {
        frame = 0;
    }
        showframe = frames[frame];
        element.style.display = 'block';
        frame ++;
        element.href.baseVal = '#' + showframe.id;
        if(frame <= stopframe) {
           setTimeout(function(){animate(frame, stopframe);}, delay);
        }/*
        else {
            element.style.display = 'none';
}*/
           else if (frame > stopframe) {
           frame = 0;
           setTimeout(function(){animate(frame, stopframe);}, delay);
        }
}

$(document).ready(function(){

    setTimeout(function(){animate(0, 3);}, delay);
    /*
    var select = document.getElementById("witch");
    //console.log(select);
    var image = new Image();
    var canvas = document.querySelector("canvas");
    var context = canvas.getContext("2d");
    image.onload = function(){
        context.drawImage(image, 0, 0);
    };
    var DOMURL = window.URL || window.webkitURL || window;
    var imgsrc = ' data:image/svg;base64,' + btoa(select);
    var svg = new Blob([imgsrc], {type: 'image/svg+xml'});
    var url = DOMURL.createObjectURL(svg);
    image.src = imgsrc;
    console.log(image);
 */

});


</script>
