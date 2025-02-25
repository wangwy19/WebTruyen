function smoothScrollBy(element, targetX, targetY, duration) {
    const startX = element.scrollLeft;
    const startY = element.scrollTop;
    const distanceX = targetX - startX;
    const distanceY = targetY - startY;
    const startTime = performance.now();

    function scrollStep(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        const easeProgress = easeInOutQuad(progress);

        element.scrollLeft = startX + distanceX * easeProgress;
        element.scrollTop = startY + distanceY * easeProgress;

        if (progress < 1) {
            requestAnimationFrame(scrollStep);
        }
    }

    function easeInOutQuad(t) {
        return t < 0.5 ? 2 * t * t : 1 - Math.pow(-2 * t + 2, 2) / 2;
    }

    requestAnimationFrame(scrollStep);
}

window.smoothScrollBy = smoothScrollBy;


