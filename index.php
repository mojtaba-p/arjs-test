<script src="https://cdn.jsdelivr.net/gh/aframevr/aframe@1.3.0/dist/aframe-master.min.js"></script>

<!--<script src='https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar.js'></script>-->
<script src="https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar-nft.js"></script>

<script>
    window.onload = function() {
        let video = document.getElementById("vid");
        document.getElementById('handler').addEventListener("markerFound", function(){
            console.log('found')
            video.play();
        });
        
        document.getElementById('handler').addEventListener("markerLost", function(){
            console.log('lost')
            video.pause();
        });

    };
</script>

<style>
    .arjs-loader {
        height: 100%;
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .arjs-loader div {
        text-align: center;
        font-size: 1.25em;
        color: white;
    }
</style>

<body style='margin : 0px; overflow: hidden;'>
    <div class="arjs-loader">
        <div>Loading, please wait...</div>
    </div>
    <a-scene
        vr-mode-ui="enabled: false;"
        renderer='antialias: true; alpha: true; precision: medium;'
        embedded arjs='trackingMethod: best; sourceType: webcam; debugUIEnabled: false;'>

        <a-assets>
            <video src="./mov_bbb.mp4"
                preload="auto" id="vid" response-type="arraybuffer" loop
                crossorigin webkit-playsinline autoplay muted playsinline>
            </video>
        </a-assets>

        <a-nft
        id="handler"
            videohandler
            type='nft' url='./mavarant'
            smooth="true" smoothCount="10" smoothTolerance="0.01" smoothThreshold="5"
        >
            <a-video
                src="#vid"
                position='-10 -10 0'
                rotation='90 0 180'
                width='300'
                height='175'
                >
            </a-video>
        </a-nft>
		<a-entity camera></a-entity>

	</a-scene>
</body>