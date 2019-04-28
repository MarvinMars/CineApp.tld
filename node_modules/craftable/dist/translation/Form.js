'use strict';

var _vue = require('vue');

var _vue2 = _interopRequireDefault(_vue);

var _BaseForm = require('../base-components/Form/BaseForm');

var _BaseForm2 = _interopRequireDefault(_BaseForm);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

_vue2.default.component('translation-form', {
    mixins: [_BaseForm2.default]
});