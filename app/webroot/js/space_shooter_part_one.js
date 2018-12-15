/*
 * Define the image holding object so all images only have to be laoded once.
 * Knowns as a singleton object
 */

var imageRepository = new function(){
    //define images
    this.background = new Image();
    // set image sources
    this.background.src = '/files/img/barFight3.png';
}
/*
 * Create the drawable object. base class for all drawable
 * objects in the game. Set up default variables that all child
 * objects will inherit as well as default functions
 */
function Drawable() {
    this.init = function(x, y) {
        this.x = x;
        this.y = y;
    }
    this.speed = 0;
    this.canvasWidth = 0;
    this.canvasHeight = 0;

    //define abstract functio to be implemented by the child objects
    this.draw = function(){};
}

function Background() {
    this.speed = 1;

    this.draw = function(){
    //pan background
        this.y+= this.speed;
        this.context.drawImage(imageRepository.background, this.x, this.y);
        //draw another image on top edge of the first image
        this.context.drawImage(imageRepository.background, this.x, this.y - this.canvasHeight);

        //clean image after dissapearing from screen
        if(this.y >= this.canvasHeight) {
            this.y = 0;
        }
    };
}

Background.prototype = new Drawable();
/*
 * Game object will hold all objects and data for the game. 
 */
function Game() {
    /*
     * Gets canvas information and context and sets up all game objects
     * returns true if teh canvas is supported and false if not.
     * This is to stop animations script running in older browsers
     */
    this.init = function(){
        this.bgCanvas = document.getElementById('background');

        if(this.bgCanvas.getContext) {
            this.bgContext = this.bgCanvas.getContext('2d');
            //init objects to contain their contecxt and canvas information
            Background.prototype.context = this.bgContext;
            Background.prototype.canvasHeight = this.bgCanvas.height;
            Background.prototype.canvasWidth = this.bgCanvas.width;
            //init background object
            this.background = new Background();
            this.background.init(0,0); //set drawing point to 0 0
            return true;
        }
        else {
            return false;
        }
    };
    this.start = function() {
        animate();
    };
}
function animate() {
    requestAnimFrame( animate );
    game.background.draw();
}
/**
 *requestAnim shim layer 
 * finds the first API that works to optimize the animation loop.
 * otherwise defaults to setTimeout();
 */
 window.requestAnimFrame = (function(){
    return  window.requestAnimationFrame ||
         window.webkitRequestAnimationFrame ||
         window.mozRequestAnimationFrame    ||
         window.oRequestAnimationFrame      ||
         window.msRequestAnimationFrame     ||
         function(/* function */ callback, /* DOMElement */ element){
             window.setTimeout(callback, 1000 / 60);
         };
 })();

/**
 * Init the game and start it
 */
var game = new Game();
function init() {
    if(game.init()) {
        game.start();
    }
}

init();
