'use strict';

var _vue = require('vue');

var _vue2 = _interopRequireDefault(_vue);

var _jquery = require('jquery');

var _jquery2 = _interopRequireDefault(_jquery);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

// This file is here only to ensure backwards compatibility

window.$ = window.jQuery = _jquery2.default;
window.Vue = _vue2.default;

var token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': token.content } });
}