import * as TOC from '../plugins/toc';

class Blog {
    constructor() {
        let self = this;
        Blog.autoGenerateTOC();
        self.NoOpener();
        self.handleContentAnchorClick();
    }

    NoOpener() {
        Array.prototype.forEach.call(document.querySelectorAll('a'), (el) => {
            if (el.hostname !== location.hostname) {
                el.setAttribute('rel', 'noopener');
            }
        });
    }

    handleContentAnchorClick() {
        Array.prototype.forEach.call(document.querySelectorAll('.post a'), (el) => {
            if (el.hostname !== location.hostname) {
                el.setAttribute('target', '_blank');
            }
        });
    }

    static autoGenerateTOC() {
        let element = document.querySelector('.toc-container');
        if (element) {
            let toc = TOC({
                selector: 'h2, h3 h4',
                scope: '.entry-content',
                overwrite: false,
                prefix: 'toc'
            });
            if (toc) {
                element.appendChild(toc);
            }
        }
    }
}
export default Blog;