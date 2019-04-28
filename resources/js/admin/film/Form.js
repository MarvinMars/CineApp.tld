import AppForm from '../app-components/Form/AppForm';

Vue.component('film-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  '' ,
                slug:  '' ,
                film_url:  '' ,
                description:  '' ,
                rating:  '' ,
                likes:  '' ,
                enabled:  false ,
                seo_keywords:  '' ,
                seo_description:  '' ,
            },
            mediaCollections: ['gallery', 'poster']
        }
    }

});