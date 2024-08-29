<?php if (!isset($is_iphone))
    die; ?>
<!DOCTYPE html>
<html lang="fa">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<script src="./assets/aframe.min.js"></script>
<script src="./assets/aframe-extras.min.js"></script>
<script src="./assets/mindar-image-aframe.prod.js"></script>
<link rel="stylesheet" href="./assets/style.css">
</head>

<body>
    <div class="modal-container" id="noticeModal">
        <div class="modal-close" onclick="closeModal()">&times;</div>
        <div class="modal-content">
            <h3>hi</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint beatae asperiores commodi aut rerum fugiat,
                quia obcaecati. Iure, ullam. Asperiores, laboriosam veritatis aperiam ab reprehenderit molestias
                quisquam consectetur enim esse?</p>
            <button onclick="closeModal()">متوجه شدم</button>
        </div>
    </div>
    <img src="./assets/logo.png" alt="logo" style="position: absolute; right: 43%; bottom: 20px" height="10%" id="logo">
    <a-scene color-space="sRGB" renderer="colorManagement: true, physicallyCorrectLights" vr-mode-ui="enabled: false" xr-mode-ui="enabled: false"
        mindar-image="uiLoading: #loadingOverlay; imageTargetSrc: https://<?php echo $_SERVER['SERVER_NAME'] ?>/assets<?php echo $_SERVER['REQUEST_URI'] ?>.mind;"
        device-orientation-permission-ui="enabled: false">
        <a-assets>
            <img id="paintandquest-preview" src="/preview.jpg" />
            <video id="vid" src="../mov_bbb.mp4" loop="true" <?php echo $is_iphone ? 'autoplay="false"' : '' ?>></video>
        </a-assets>
        <a-camera position="0 0 0" look-controls="enabled: false" cursor="fuse: false; rayOrigin: mouse;"
            raycaster="far: 10000; objects: .clickable"></a-camera>
        <a-entity mindar-image-target="targetIndex: 0" class="target">
            <a-video position="0 0 0" rotation="0 0 0" width="1.0" height="1.33333333" webkit-playsinline playsinline
                id="video-object"></a-video>
            <a-image id="paintandquest-preview-button" class="clickable" src="#paintandquest-preview" alpha-test="0.5"
                position="0 0 0" rotation="0 0 0" height="1.33333333" width="1">
            </a-image>
        </a-entity>
    </a-scene>
    <script>
        const paintandquestPreviewButton = document.querySelector("#paintandquest-preview-button");
        paintandquestPreviewButton.addEventListener('click', () => {
            paintandquestPreviewButton.setAttribute("visible", false);
            document.querySelector("#video-object").setAttribute("src", "#vid");
            document.querySelector('#vid').play();
        });
        document.querySelectorAll('.target').forEach(function (item) {
            paintandquestPreviewButton.setAttribute("visible", true);
            item.addEventListener('targetLost', () => document.querySelector('#vid').pause());
        });
        function closeModal() {
            const modal = document.getElementById('noticeModal');
            modal.classList.remove('active');
        }
    </script>
</body>

</html>