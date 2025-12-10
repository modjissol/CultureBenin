// home-video-rotation.js

document.addEventListener('DOMContentLoaded', function () {
    const videoList = [
        '/adminlte/img/tina.mp4',
        '/adminlte/img/tino.mp4',
        '/adminlte/img/tins.mp4',
        '/adminlte/img/tiny.mp4',
        '/adminlte/img/vide.mp4',
    ];
    let current = 0;
    const video = document.querySelector('.hero-video-bg');
    if (!video) return;

    function setVideo(idx) {
        // Remove all <source> children
        while (video.firstChild) video.removeChild(video.firstChild);
        // Add new source
        const source = document.createElement('source');
        source.src = videoList[idx];
        source.type = 'video/mp4';
        video.appendChild(source);
        video.load();
        video.play();
    }

    setInterval(() => {
        current = (current + 1) % videoList.length;
        setVideo(current);
    }, 10000); // Change every 10 seconds
});
