'use strict';

Object.defineProperty(exports, "__esModule", {
    value: true
});
var Admin = {
    el: '#app',
    data: function data() {
        return {
            loading: false
        };
    },
    mounted: function mounted() {
        var _this = this;

        // Add a loader request interceptor
        axios.interceptors.request.use(function (config) {
            _this.setLoading(true);
            return config;
        }, function (error) {
            _this.setLoading(false);
            return Promise.reject(error);
        });

        // Add a loader response interceptor
        axios.interceptors.response.use(function (response) {
            _this.setLoading(false);
            return response;
        }, function (error) {
            _this.setLoading(false);
            return Promise.reject(error);
        });
    },

    methods: {
        setLoading: function setLoading(value) {
            this.loading = !!value;
        }
    }
};

exports.default = Admin;