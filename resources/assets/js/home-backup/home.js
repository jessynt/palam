import Blog from "./blog";


function initialize() {
    window.Blog = new Blog;
}
if (document.readyState === 'complete' || document.readyState !== 'loading') {
    initialize()
} else {
    document.addEventListener('DOMContentLoaded', initialize());
}