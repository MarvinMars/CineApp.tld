<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': this.fields.title && this.fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.film.columns.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title'), 'form-control-success': this.fields.title && this.fields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.film.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('film_url'), 'has-success': this.fields.film_url && this.fields.film_url.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.film.columns.film_url') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.film_url" v-validate="''" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('film_url'), 'form-control-success': this.fields.film_url && this.fields.film_url.valid}"
               id="film_url" name="film_url" placeholder="{{ trans('admin.film.columns.film_url') }}">
        <div v-if="errors.has('film_url')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('film_url') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('slug'), 'has-success': this.fields.slug && this.fields.slug.valid }">
    <label for="slug" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.film.columns.slug') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.slug" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('slug'), 'form-control-success': this.fields.slug && this.fields.slug.valid}" id="slug" name="slug" placeholder="{{ trans('admin.film.columns.slug') }}">
        <div v-if="errors.has('slug')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('slug') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': this.fields.description && this.fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.film.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="''" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('rating'), 'has-success': this.fields.rating && this.fields.rating.valid }">
    <label for="rating" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.film.columns.rating') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.rating" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('rating'), 'form-control-success': this.fields.rating && this.fields.rating.valid}" id="rating" name="rating" placeholder="{{ trans('admin.film.columns.rating') }}">
        <div v-if="errors.has('rating')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('rating') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('year'), 'has-success': this.fields.rating && this.fields.year.valid }">
    <label for="rating" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.film.columns.year') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.year" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('year'), 'form-control-success': this.year.rating && this.fields.year.valid}" id="year" name="year" placeholder="{{ trans('admin.film.columns.year') }}">
        <div v-if="errors.has('year')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('year') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('seo_keywords'), 'has-success': this.fields.seo_keywords && this.fields.seo_keywords.valid }">
    <label for="seo_keywords" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.film.columns.seo_keywords') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.seo_keywords" v-validate="''" id="seo_keywords" name="seo_keywords" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('seo_keywords')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('seo_keywords') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('seo_description'), 'has-success': this.fields.seo_description && this.fields.seo_description.valid }">
    <label for="seo_description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.film.columns.seo_description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.seo_description" v-validate="''" id="seo_description" name="seo_description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('seo_description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('seo_description') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': this.fields.enabled && this.fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            {{ trans('admin.film.columns.enabled') }}
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enabled') }}</div>
    </div>
</div>
