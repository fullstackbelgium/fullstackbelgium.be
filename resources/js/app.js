import { $, $$ } from './util';

$$('[data-gallery]').forEach(galleryEl => {
    const itemEls = $$('[data-gallery-item]', galleryEl);
    const pswpEl = $('.pswp', galleryEl);
    const items = itemEls.map(itemEl => ({ ...itemEl.dataset }));

    itemEls.forEach((itemEl, index) => {
        itemEl.addEventListener('click', () => {
            import('./photoswipe' /* webpackChunkName: "preload-photoswipe" */).then(({ init }) => {
                init({ pswpEl, items, index });
            });
        });
    });
});
