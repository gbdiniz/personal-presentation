import './bootstrap';

import { gsap } from "gsap";

import { ScrollTrigger } from "gsap/ScrollTrigger";
// ScrollSmoother requires ScrollTrigger
import { ScrollSmoother } from "gsap/ScrollSmoother";
import { SplitText } from "gsap/SplitText";

gsap.registerPlugin(ScrollTrigger, ScrollSmoother, SplitText);

const hscroll = document.querySelector('#content');
if (hscroll) {
    function getScrollAmount() {
        return -(hscroll.offsetWidth - window.innerWidth);
    }

    gsap.timeline({
        scrollTrigger: {
            trigger: '#wraper',
            start: 'top',
            end: () => `+=${-getScrollAmount()}`,
            pin: true,
            scrub: 1,
            invalidateOnRefresh: true,
        }
    }).to(hscroll, {
        x: getScrollAmount,
        duration: 5,
    });
}