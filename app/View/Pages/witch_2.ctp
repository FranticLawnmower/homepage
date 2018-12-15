<style>
canvas {
    position: absolute;
    top: 0px;
    left: 0px;
    background: transparent;
}
</style>
<canvas id="background" width="600" height="360">
    Your browser does not support Html canvas. Please try again with a different browser.
</canvas>
<?
echo $this->Html->script('space_shooter_part_one.js');
?>
