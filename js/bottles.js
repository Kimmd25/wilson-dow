var scene, camera, renderer, obj;

var WIDTH  = 200;
var HEIGHT = 850;

var SPEED = 0.015;

function init() {
    scene = new THREE.Scene();

    initMesh();
    initCamera();
    initLights();
    addLights();
    initRenderer();
    // container = ;
    // document.body.appendChild( container );
    document.getElementById( 'bottle1' ).appendChild(renderer.domElement);
}

function initCamera() {
    camera = new THREE.PerspectiveCamera( 45, 200 / 850, 1, 1000 );
        camera.position.z = 320;
    camera.lookAt(scene.position);
}

function addLights() {
    var dirLight = new THREE.DirectionalLight(0xffffff, 1);
    dirLight.position.set(100, 100, 50);
    scene.add(dirLight);
}
function initRenderer() {
    renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true});
    renderer.setSize(WIDTH, HEIGHT);
}

function initLights() {
    var light = new THREE.AmbientLight(0xffffff, 1);
    scene.add(light);
}

var onProgress = function ( xhr ) {
          if ( xhr.lengthComputable ) {
            var percentComplete = xhr.loaded / xhr.total * 100;
            console.log( Math.round(percentComplete, 2) + '% downloaded' );
          }
        };
        var onError = function ( xhr ) { };

var mesh = null;
function initMesh() {

    var object;
    var mtlLoader = new THREE.MTLLoader();
        mtlLoader.setPath( 'bottle/' );
        mtlLoader.load( 'Bottle_v06.mtl', function( materials ) {
          materials.preload();
          var objLoader = new THREE.OBJLoader();
          objLoader.setMaterials( materials );
          objLoader.setPath( 'bottle/' );
          objLoader.load( 'Bottle_v06.obj', function ( object ) {
            object.position.y = -25;
            object.position.x = 0;
            object.scale.x = 1;
                    object.scale.y = 1;
                    object.scale.z = 1;
                    obj = object;
            scene.add( obj );
          }, onProgress, onError );
        });


}

function rotateMesh() {
    if (!obj) {
        return;
    }
    obj.rotation.y -= SPEED;
}

function render() {
    requestAnimationFrame(render);
    rotateMesh();
    renderer.render(scene, camera);
}

init();
render();
