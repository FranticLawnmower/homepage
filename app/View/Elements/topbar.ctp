<?
//echo $this->Html->css('animate.css');
//echo $this->Html->css('custom_animated.css');
/*?>
<nav role="navigation">
<div id="menuToggle">
<input type="checkbox">
<span class="menu-span"></span>
<span class="menu-span"></span>
<span class="menu-span"></span>
    <ul id="menu">
        <li><a href="<?= $this->Html->url(array('controller' => 'pages', 'action' => 'home'));?>">Home</a></li>
        <li><a href="<?= $this->Html->url(array('controller' => 'users', 'action' => 'admin'));?>">Admin</a></li>
        <li><a href="<?=$this->Html->url(array('controller'=> 'items', 'action' => '')); ?>">Items</a></li>
    </ul>
</div>
</nav>
 */?>
<div id="menuToggle" style="position:relative; height:50px; top:95vh;" >
    <input id="togglebox"type="checkbox">
    <span class="menu-span"></span>
    <span class="menu-span"></span>
    <span class="menu-span"></span>
    <div class="pulse" style="position:absolute;">
        <ul id="menu_tekst" style="position:absolute; bottom:5rem; left:5em; z-index:1;">
            <li><a href="<?= $this->Html->url(array('controller' => 'pages', 'action' => 'home'));?>">Home</a></li>
            <li><a href="<?= $this->Html->url(array('controller' => 'users', 'action' => 'admin'));?>">Admin</a></li>
            <li><a href="<?=$this->Html->url(array('controller'=> 'items', 'action' => '')); ?>">Items</a></li>
        </ul>
<div id="background" style="position:absolute;">
</div>
<?/*
        <svg class="icon" role="presentation" title="menu" style="position:absolute; bottom:1em; left:1em; width:25em; height:25em;">
            <use xlink:href="/img/svg_icons/explosion.svg"/>
            </svg>
 */
?>

    </div>
</div>
<?
echo '<div class="svg_container"><svg title="explosion" style=" height:100%; width:100%; position:absolute; left:1em;">'.
'<use id="screen" xlink:href="#explode1" style="display:none;">'.
'</use>'.
'</svg></div>';
?>
 <script>

    var frames = $('#explode symbol');
    var showframe;
    var element = document.getElementsByTagName('use')[0];
    //animation loop
    function animate(frame, stopframe) {
        if(frame == undefined || frame < 0) {
            frame = 8;
        }
        showframe = frames[frame];
        element.style.display = 'block';
        frame --;
        element.href.baseVal = '#' + showframe.id;
        if(frame >= stopframe) {
           setTimeout(function(){animate(frame, stopframe);}, 125);
        }
        else {
            element.style.display = 'none';
        }
        /* to enable loop uncomment 
           else if (frame < stopframe) {
           frame = 8;
           setTimeout(function(){animate(frame, stopframe);}, 125);
        }*/
    }
$('#togglebox').on('change', function(){
   setTimeout(function(){animate(8, 0);}, 125);
});
 </script>
