window.addEventListener("load", () => {
    const video = document.getElementById("hero-video");
    if (!video) return;

    const isMobile = window.matchMedia("(max-width: 768px)").matches;
    const source = document.createElement("source");
    source.src = isMobile ? "/videos/teaser-mobile.mp4" : "/videos/teaser.mp4";
    source.type = "video/mp4";
    video.appendChild(source);
    video.load();
    video.play().catch(() => {});
});
