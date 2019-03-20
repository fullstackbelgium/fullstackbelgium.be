import PhotoSwipe from 'photoswipe';
import PhotoSwipeUI_Default from 'photoswipe/dist/photoswipe-ui-default';

export function init({ pswpEl, items, index }) {
    new PhotoSwipe(pswpEl, PhotoSwipeUI_Default, items, {
        index,
        history: false,
    }).init();
}
