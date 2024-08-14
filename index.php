<!DOCTYPE html>
<html lang="fa">

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    
    <script src="/assets/aframe.min.js"></script>
    <script src="/assets/aframe-extras.min.js"></script>
    <script src="/assets/mindar-image-aframe.prod.js"></script>

    <style>
        #example-scanning-overlay {
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            background: transparent;
            z-index: 2;
        }

        #example-scanning-overlay.hidden {
            display: none;
        }

        #example-scanning-overlay img {
            opacity: 0.6;
            width: 90%;
            align-self: center;
        }

        #example-scanning-overlay .inner .scanline {
            position: absolute;
            width: 100%;
            height: 10px;
            background: white;
            animation: move 2s linear infinite;
        }
    </style>
</head>

<body>
    <div id="example-scanning-overlay" class="hidden">
        <div class="inner">
            <img src="/assets/logo.png" />
        </div>
    </div>
    <img src="/assets/logo.png" alt="logo" style="position: absolute; right: 43%; bottom: 20px" height="10%" id="logo">
    <a-scene color-space="sRGB" renderer="colorManagement: true, physicallyCorrectLights" vr-mode-ui="enabled: false"
        xr-mode-ui="enabled: false"
        mindar-image="uiLoading: #example-scanning-overlay; imageTargetSrc: https://<?php echo $_SERVER['SERVER_NAME'] ?>/assets<?php echo $_SERVER['REQUEST_URI'] ?>.mind;"
        device-orientation-permission-ui="enabled: false">
        <a-assets>
            <video src="../mov_bbb.mp4" preload="auto" id="vid" response-type="arraybuffer" loop crossorigin
                webkit-playsinline autoplay playsinline>
            </video>
        </a-assets>

        <a-camera position="0 0 0" look-controls="enabled: false"></a-camera>

        <a-entity mindar-image-target="targetIndex: 1" class="target">
            <a-video src="#vid" position='0 0 0' rotation='0 0 0' scale="1 1 1">
            </a-video>
        </a-entity>
    </a-scene>
    <script>

        document.querySelectorAll('.target').forEach(function (item) {
            item.addEventListener('targetFound', () => document.querySelector('#vid').play());
            item.addEventListener('targetLost', () => document.querySelector('#vid').pause());
        })
    </script>
</body>

</html>