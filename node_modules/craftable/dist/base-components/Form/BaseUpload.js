'use strict';

Object.defineProperty(exports, "__esModule", {
  value: true
});

var _vue2Dropzone = require('vue2-dropzone');

var _vue2Dropzone2 = _interopRequireDefault(_vue2Dropzone);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

var BaseUpload = {
  components: {
    Dropzone: _vue2Dropzone2.default
  },
  props: {
    url: {
      type: String,
      required: true
    },
    collection: {
      type: String,
      required: true
    },
    maxNumberOfFiles: {
      type: Number,
      required: false,
      default: 1
    },
    maxFileSizeInMb: {
      type: Number,
      required: false,
      default: 2
    },
    acceptedFileTypes: {
      type: String,
      required: false
    },
    thumbnailWidth: {
      type: Number,
      required: false,
      default: 200
    },
    uploadedImages: {
      type: Array,
      required: false,
      default: function _default() {
        return [];
      }
    }
  },
  data: function data() {
    return {
      mutableUploadedImages: this.uploadedImages,
      headers: {
        'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').getAttribute('content')
      }
    };
  },
  template: '<dropzone :id="collection" \n                       :url="url" \n                       v-bind:preview-template="template"\n                       v-on:vdropzone-success="onSuccess"\n                       v-on:vdropzone-error="onUploadError"\n                       v-on:vdropzone-removed-file="onFileDelete"\n                       v-on:vdropzone-file-added="onFileAdded"\n                       :useFontAwesome="true" \n                       :ref="collection"\n                       :maxNumberOfFiles="maxNumberOfFiles"\n                       :maxFileSizeInMB="maxFileSizeInMb"\n                       :acceptedFileTypes="acceptedFileTypes"\n                       :thumbnailWidth="thumbnailWidth"\n                       :headers="headers">\n                \n                <input type="hidden" name="collection" :value="collection">\n            </dropzone>',
  mounted: function mounted() {
    this.attachAlreadyUploadedMedia();
  },
  methods: {
    onSuccess: function onSuccess(file, response) {
      if (!file.type.includes('image')) {
        setTimeout(function () {
          //FIXME jquery
          $(file.previewElement).removeClass('dz-file-preview');
        }, 3000);
      }
    },

    onUploadError: function onUploadError(file, error) {
      var errorMessage = typeof error == 'string' ? error : error.message;
      this.$notify({ type: 'error', title: 'Error!', text: errorMessage });
      $(file.previewElement).find('.dz-error-message span').text(errorMessage);
    },

    onFileAdded: function onFileAdded(file) {
      this.placeIcon(file);
    },

    onFileDelete: function onFileDelete(file, error, xhr) {
      var deletedFileIndex = _.findIndex(this.mutableUploadedImages, { url: file.url });
      if (this.mutableUploadedImages[deletedFileIndex]) {
        this.mutableUploadedImages[deletedFileIndex]['deleted'] = true;

        //dontSubstractMaxFiles fix
        var currentMax = this.$refs[this.collection].dropzone.options.maxFiles;
        this.$refs[this.collection].setOption('maxFiles', currentMax + 1);
      }
    },

    attachAlreadyUploadedMedia: function attachAlreadyUploadedMedia() {
      var _this = this;

      this.$nextTick(function () {
        if (_this.mutableUploadedImages) {
          _.each(_this.mutableUploadedImages, function (file, key) {

            _this.$refs[_this.collection].manuallyAddFile({ name: file['name'],
              size: file['size'],
              type: file['type'],
              url: file['url']
            }, file['thumb_url'], false, false, {
              dontSubstractMaxFiles: false,
              addToFiles: true
            });
          });
        }
      });
    },

    getFiles: function getFiles() {
      var _this2 = this;

      var files = [];

      _.each(this.mutableUploadedImages, function (file, key) {
        if (file.deleted) {
          files.push({
            id: file.id,
            collection_name: _this2.collection,
            action: 'delete'
          });
        }
      });

      _.each(this.$refs[this.collection].getAcceptedFiles(), function (file, key) {
        var response = JSON.parse(file.xhr.response);

        if (response.path) {
          files.push({
            id: file.id,
            collection_name: _this2.collection,
            path: response.path,
            action: file.deleted ? 'delete' : 'add', //TODO: update ie. meta_data.name
            meta_data: {
              name: file.name, //TODO: editable in the future
              file_name: file.name,
              width: file.width,
              height: file.height
            }
          });
        }
      });

      return files;
    },

    placeIcon: function placeIcon(file) {
      //FIXME cele to je jqueryoidne, asi si budeme musiet spravit vlastny vue wrapper, tento je zbugovany
      var $previewElement = $(file.previewElement);

      if (file.url) {
        $previewElement.find('.dz-filename').html('<a href="' + file.url + '" target="_BLANK" class="dz-btn dz-custom-download">' + file.name + '</a>');
      }

      if (file.type.includes('image')) {
        //nothing, default thumb
      } else if (file.type.includes('pdf')) {
        $previewElement.find('.dz-image').html('<i class="fa fa-file-pdf-o"></i><p>' + file.name + '</p>');
      } else if (file.type.includes('word')) {
        $previewElement.find('.dz-image').html('<i class="fa fa-file-word-o"></i><p>' + file.name + '</p>');
      } else if (file.type.includes('spreadsheet') || file.type.includes('csv')) {
        $previewElement.find('.dz-image').html('<i class="fa fa-file-excel-o"></i><p>' + file.name + '</p>');
      } else if (file.type.includes('presentation')) {
        $previewElement.find('.dz-image').html('<i class="fa fa-file-powerpoint-o"></i><p>' + file.name + '</p>');
      } else if (file.type.includes('video')) {
        $previewElement.find('.dz-image').html('<i class="fa fa-file-video-o"></i><p>' + file.name + '</p>');
      } else if (file.type.includes('text')) {
        $previewElement.find('.dz-image').html('<i class="fa fa-file-text-o"></i><p>' + file.name + '</p>');
      } else if (file.type.includes('zip') || file.type.includes('rar')) {
        $previewElement.find('.dz-image').html('<i class="fa fa-file-archive-o"></i><p>' + file.name + '</p>');
      } else {
        $previewElement.find('.dz-image').html('<i class="fa fa-file-o"></i><p>' + file.name + '</p>');
      }
    },

    template: function template() {
      return '\n              <div class="dz-preview dz-file-preview">\n                  <div class="dz-image">\n                      <img data-dz-thumbnail />\n                  </div>\n                  <div class="dz-details">\n                    <div class="dz-size"><span data-dz-size></span></div>\n                    <div class="dz-filename"></div>\n                  </div>\n                  <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>\n                  <div class="dz-error-message"><span data-dz-errormessage></span></div>\n                  <div class="dz-success-mark"><i class="fa fa-check"></i></div>\n                  <div class="dz-error-mark"><i class="fa fa-close"></i></div>\n              </div>\n          ';
    }
  }
};

exports.default = BaseUpload;