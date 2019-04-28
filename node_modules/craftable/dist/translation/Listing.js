'use strict';

var _vue = require('vue');

var _vue2 = _interopRequireDefault(_vue);

var _BaseListing = require('../base-components/Listing/BaseListing');

var _BaseListing2 = _interopRequireDefault(_BaseListing);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

$(document).ready(function ($) {
    $(document).on('click', '.close_button', function (e) {
        $(this).closest('.show').removeClass('show');
    });

    $(document).on('click', '.dropdown-menu.dropdown-menu-dont-auto-close', function (e) {
        e.stopPropagation();
    });
});

_vue2.default.component('translation-listing', {

    mixins: [_BaseListing2.default],

    props: {
        label: {
            type: String,
            default: function _default() {
                return 'All groups';
            }
        },
        stepCount: {
            type: Number,
            default: function _default() {
                return 3;
            }
        },
        locales: {}
    },

    data: function data() {
        var exportMultiselect = {};
        Object.values(this.locales).forEach(function (value) {
            exportMultiselect[value] = true;
        });
        return {
            templateChecked: false,
            exportMultiselect: exportMultiselect,
            languagesToExport: this.locales,
            importLanguage: '',
            file: null,
            onlyMissing: false,
            currentStep: 1,
            scanning: false,
            filters: {
                group: null
            },
            translationId: null,
            translationDefault: '',
            numberOfSuccessfullyImportedTranslations: 0,
            numberOfSuccessfullyUpdatedTranslations: 0,
            numberOfFoundTranslations: 0,
            numberOfTranslationsToReview: 0,
            translationsToImport: null,
            translations: {},
            importedFile: null
        };
    },

    watch: {
        exportMultiselect: {
            handler: function handler(newVal, oldVal) {
                var _this = this;

                this.languagesToExport = [];

                Object.keys(newVal).forEach(function (key) {
                    if (newVal[key]) {
                        _this.languagesToExport.push(key);
                    }
                });
            },

            deep: true
        }
    },
    computed: {
        filteredGroup: function filteredGroup() {
            return this.filters.group === null ? this.label : this.filters.group;
        },
        lastStep: function lastStep() {
            return this.currentStep === this.stepCount;
        }
    },
    methods: {
        rescan: function rescan(url) {
            var _this2 = this;

            this.scanning = true;
            axios.post(url).then(function (response) {
                _this2.scanning = false;
                _this2.loadData(true);
            }, function (error) {
                _this2.scanning = false;
                _this2.$notify({ type: 'error', title: 'Error!', text: 'An error has occured.' });
            });
        },
        filterGroup: function filterGroup(group) {
            this.filters.group = group;
            this.loadData(true);
        },
        resetGroup: function resetGroup() {
            this.filters.group = null;
            this.loadData(true);
        },
        editTranslation: function editTranslation(item) {
            this.$modal.show('edit-translation', item);
        },
        showImport: function showImport() {
            this.$modal.show('import-translation');
        },
        showExport: function showExport() {
            this.$modal.show('export-translation');
        },
        nextStep: function nextStep() {
            var _this3 = this;

            if (this.currentStep === 1) {
                return this.$validator.validateAll().then(function (result) {
                    if (!result) {
                        _this3.$notify({ type: 'error', title: 'Error!', text: 'The form contains invalid fields.' });
                        return false;
                    }

                    var url = '/admin/translations/import';
                    var formData = new FormData();

                    formData.append('fileImport', _this3.file);
                    formData.append('importLanguage', _this3.importLanguage);
                    formData.append('onlyMissing', _this3.onlyMissing);

                    axios.post(url, formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }).then(function (response) {
                        if (response.data.hasOwnProperty('numberOfImportedTranslations') && response.data.hasOwnProperty('numberOfUpdatedTranslations')) {
                            _this3.currentStep = 3;
                            _this3.numberOfSuccessfullyImportedTranslations = response.data.numberOfImportedTranslations;
                            _this3.numberOfSuccessfullyUpdatedTranslations = response.data.numberOfUpdatedTranslations;
                            _this3.loadData();
                        } else {
                            _this3.currentStep = 2;
                            _this3.numberOfFoundTranslations = Object.keys(response.data).length;
                            _this3.translationsToImport = response.data;

                            for (var i = 0; i < _this3.translationsToImport.length; i++) {
                                if (_this3.translationsToImport[i].hasOwnProperty('has_conflict')) {
                                    if (_this3.translationsToImport[i].has_conflict) {
                                        _this3.numberOfTranslationsToReview++;
                                    }
                                }
                            }
                        }
                    }, function (error) {
                        if (error.response.data === "Wrong syntax in your import") _this3.$notify({ type: 'error', title: 'Error!', text: 'Wrong syntax in your import.' });else if (error.response.data === "Unsupported file type") _this3.$notify({ type: 'error', title: 'Error!', text: 'Unsupported file type.' });else _this3.$notify({ type: 'error', title: 'Error!', text: 'An error has occured.' });
                    });
                });
            } else if (this.currentStep === 2) {
                return this.$validator.validateAll().then(function (result) {
                    if (!result) {
                        _this3.$notify({ type: 'error', title: 'Error!', text: 'The form contains invalid fields.' });
                        return false;
                    }

                    for (var i = 0; i < _this3.translationsToImport.length; i++) {
                        if (_this3.translationsToImport[i].hasOwnProperty('checkedCurrent')) {
                            if (_this3.translationsToImport[i].checkedCurrent) {
                                _this3.translationsToImport[i][_this3.importLanguage.toLowerCase()] = _this3.translationsToImport[i].current_value;
                            }
                        }
                    }

                    var url = '/admin/translations/import/conflicts';
                    var data = {
                        importLanguage: _this3.importLanguage,
                        resolvedTranslations: _this3.translationsToImport
                    };

                    axios.post(url, data).then(function (response) {
                        _this3.currentStep = 3;
                        _this3.numberOfSuccessfullyImportedTranslations = response.data.numberOfImportedTranslations;
                        _this3.numberOfSuccessfullyUpdatedTranslations = response.data.numberOfUpdatedTranslations;
                        _this3.loadData();
                    }, function (error) {
                        _this3.$notify({ type: 'error', title: 'Error!', text: 'An error has occured.' });
                    });
                });
            }
        },
        previousStep: function previousStep() {
            this.currentStep--;
        },
        beforeModalOpen: function beforeModalOpen(_ref) {
            var params = _ref.params;

            this.translationId = params.id;
            this.translationDefault = params.key;
            this.translations = {};
            var _iteratorNormalCompletion = true;
            var _didIteratorError = false;
            var _iteratorError = undefined;

            try {
                for (var _iterator = Object.keys(params.text)[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
                    var key = _step.value;

                    this.translations[key] = params.text[key];
                }
            } catch (err) {
                _didIteratorError = true;
                _iteratorError = err;
            } finally {
                try {
                    if (!_iteratorNormalCompletion && _iterator.return) {
                        _iterator.return();
                    }
                } finally {
                    if (_didIteratorError) {
                        throw _iteratorError;
                    }
                }
            }
        },
        onSubmit: function onSubmit() {
            var _this4 = this;

            var url = '/admin/translations/' + this.translationId;
            var data = {
                text: this.translations
            };

            axios.post(url, data).then(function (response) {
                _this4.$modal.hide('edit-translation');
                _this4.$notify({ type: 'success', title: 'Success!', text: 'Item successfully changed.' });
                _this4.loadData();
            }, function (error) {
                _this4.$notify({ type: 'error', title: 'Error!', text: 'An error has occured.' });
            });
        },
        onSubmitExport: function onSubmitExport() {
            var _this5 = this;

            return this.$validator.validateAll().then(function (result) {
                if (!result) {
                    _this5.$notify({ type: 'error', title: 'Error!', text: 'The form contains invalid fields.' });
                    return false;
                }

                var data = {
                    exportLanguages: _this5.languagesToExport
                };

                var url = '/admin/translations/export?' + $.param(data);
                window.location = url;
                _this5.$modal.hide('export-translation');
            });
        },
        handleImportFileUpload: function handleImportFileUpload(e) {
            this.file = this.$refs.file.files[0];
            this.importedFile = e.target.files[0];
        },
        onCloseImportModal: function onCloseImportModal() {
            this.currentStep = 1;
            this.importedFile = '';
            this.importLanguage = '';
            this.onlyMissing = false;
            this.translationsToImport = null;
        }
    }
});