import AppForm from '../app-components/Form/AppForm';

Vue.component('comment-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                content:  '' ,
                likes:  '' ,
                user_id:  '' ,
                film_id:  '' ,
                parent_id:  '' ,
                
            }
        }
    }

});