//字体大小
var d_W = document.documentElement.clientWidth;
(function (doc, win) {
    var docEl = doc.documentElement,
        resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
        recalc    = function () {
            var clientWidth = docEl.clientWidth;
            if (clientWidth>=1024) {
                clientWidth = 1024;
            };
            if (!clientWidth) return;
            docEl.style.fontSize = 100 * (clientWidth / 1024) + 'px';
        };
    if (!doc.addEventListener) return;
    win.addEventListener(resizeEvt, recalc, false);
    doc.addEventListener('DOMContentLoaded', recalc, false);
})(document, window);