/*
	Helios by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
	WP-Helios by Netural
*/

(function($) {

    function a() {
        for (var a = 0; h > a; a++) j.push({
            x: Math.random() * k,
            y: Math.random() * l,
            size: 1 + 3 * Math.random(),
            weight: Math.random() * h,
            angle: 360 * Math.random()
        });
        b(), window.addEventListener("resize", b), window.addEventListener("mousemove", c), void 0 !== window.orientation && window.addEventListener("deviceorientation", d), document.body.insertBefore(o, document.body.firstChild), window.requestAnimationFrame(e)
    }

    function b() {
        k = window.innerWidth, l = window.innerHeight, m = k / 2, o.width = k, o.height = l
    }

    function c(a) {
        n.x = a.x || a.clientX, n.y = a.y || a.clientY, i.x = f(n.x - m, -m, m, 4, -4)
    }

    function d(a) {
        null !== a.gamma && (i.x = window.orientation % 180 ? f(a.beta, -60, 60, 4, -4) : f(a.gamma, -60, 60, -4, 4), q && (window.removeEventListener("mousemove", mousemove), q = !1))
    }

    function e() {
        p.clearRect(0, 0, k, l), p.fillStyle = "rgba(250,250,250,0.8)", p.beginPath();
        for (var a = 0; h > a; a++) {
            var b = j[a];
            p.moveTo(b.x, b.y), p.arc(b.x, b.y, b.size, 0, 2 * Math.PI, !0)
        }
        p.fill(), g(), requestAnimationFrame(e)
    }

    function f(a, b, c, d, e) {
        return (a - b) * (e - d) / (c - b) + d
    }

    function g() {
        for (var a = 0; h > a; a++) {
            var b = j[a];
            b.angle += .01, b.y += Math.cos(b.weight) + i.y + b.size / 2, b.x += Math.sin(b.angle) + i.x, (b.x > k + 5 || b.x < -5 || b.y > l) && (a % 3 > 0 ? (b.x = Math.random() * k, b.y = -5) : b.x > m ? (b.x = -5, b.y = Math.random() * l) : (b.x = k + 5, b.y = Math.random() * l))
        }
    }

    var h = 75,
        i = {
            x: 2,
            y: 1
        },
        j = [],
        k = window.innerWidth,
        l = window.innerHeight,
        m = k / 2,
        n = {
            x: 0,
            y: 0
        },
        o = document.createElement("canvas"),
        p = o.getContext("2d");
    o.className = "snow", a();
    var q = !0;

})(jQuery);
