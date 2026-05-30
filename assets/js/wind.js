
function mountGlide(selector, options) {
    if (!document.querySelector(selector)) {
        return null;
    }

    const instance = new Glide(selector, options);
    instance.mount();
    return instance;
}

const closeMenu = document.getElementById("closeMenu");
const NavMenu = document.getElementById("NavMenu");
const menubrop = document.getElementById("menubrop");

if (closeMenu && NavMenu) {
    closeMenu.addEventListener('click', function () {
        NavMenu.style.webkitTransform = "translateX(-100%)";
    });
}

if (menubrop && NavMenu) {
    menubrop.addEventListener('click', function () {
        NavMenu.style.webkitTransform = "translateX(0%)";
    });
}

mountGlide('.heroSlider', {
    type: 'carousel',
    focusAt: 1,
    perView: 1,
    autoplay: 3500,
    animationDuration: 700,
    gap: 24,
    classes: {
        activeNav: '[&>*]:bg-slate-700',
    },
    breakpoints: {
        1024: {
            perView: 1
        },
        640: {
            perView: 1
        }
    },
});

mountGlide('.slider2', {
    type: 'carousel',
    focusAt: 1,
    perView: 4,
    autoplay: 3500,
    animationDuration: 700,
    gap: 24,
    classes: {
        activeNav: '[&>*]:bg-slate-700',
    },
    breakpoints: {
        1680: {
            perView: 4
        },
        1250: {
            perView: 3
        },
        1024: {
            perView: 2
        },
        955: {
            perView: 2
        },
        820: {
            perView: 2
        },
        640: {
            perView: 1
        }
    },
});

mountGlide('.philosophy', {
    type: 'carousel',
    perView: 3,
    focusAt: 'center',
    autoplay: 3500,
    animationDuration: 700,
    gap: 0,
    classes: {
        activeNav: '[&>*]:bg-slate-700',
    },
    breakpoints: {
        1680: {
            perView: 4
        },
        1380: {
            perView: 3
        },
        1024: {
            perView: 2
        },
        767: {
            perView: 2
        },
        640: {
            perView: 1
        }
    },
});

mountGlide('.campus', {
    type: 'carousel',
    focusAt: 1,
    perView: 3,
    autoplay: 3500,
    animationDuration: 700,
    gap: 24,
    classes: {
        activeNav: '[&>*]:bg-slate-700',
    },
    breakpoints: {
        1680: { perView: 4 },
        1280: { perView: 3 },
        1024: { perView: 3 },
        820: { perView: 2 },
        640: { perView: 1 },
    },
});

mountGlide('.latestNews', {
    type: 'carousel',
    focusAt: 1,
    perView: 4,
    autoplay: 3500,
    animationDuration: 700,
    gap: 24,
    classes: {
        activeNav: '[&>*]:bg-slate-700',
    },
    breakpoints: {
        1024: {
            perView: 4
        },
        640: {
            perView: 1
        }
    },
});

mountGlide('.about-carousel', {
    type: 'carousel',
    focusAt: 'center',
    perView: 4,
    autoplay: 3500,
    animationDuration: 700,
    gap: 24,
    classes: {
        activeNav: '[&>*]:bg-slate-700',
    },
    breakpoints: {
        1680: {
            perView: 4
        },
        1024: {
            perView: 3
        },
        820: {
            perView: 2
        },
        640: {
            perView: 1
        }
    },
});
