window._ = require('lodash');
window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');
require('./plugins/admin-lte');
(function ($) {
    window.Blog = {
        initialize: function () {
            var self = this;
        }
    }
})(jQuery);

$(document).ready(function () {
    Blog.initialize();
});