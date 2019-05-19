<div class="form-group row align-items-center" :class="{'has-danger': veeErrors.has('title'), 'has-success': this.veeFields.title && this.veeFields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.post.columns.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': veeErrors.has('title'), 'form-control-success': this.veeFields.title && this.veeFields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.post.columns.title') }}">
        <div v-if="veeErrors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ veeErrors.first('title') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': veeErrors.has('header_subtitle'), 'has-success': this.veeFields.header_subtitle && this.veeFields.header_subtitle.valid }">
    <label for="header_subtitle" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.post.columns.header_subtitle') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.header_subtitle" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': veeErrors.has('header_subtitle'), 'form-control-success': this.veeFields.header_subtitle && this.veeFields.header_subtitle.valid}" id="header_subtitle" name="header_subtitle" placeholder="{{ trans('admin.post.columns.header_subtitle') }}">
        <div v-if="veeErrors.has('header_subtitle')" class="form-control-feedback form-text" v-cloak>@{{ veeErrors.first('header_subtitle') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': veeErrors.has('slug'), 'has-success': this.veeFields.slug && this.veeFields.slug.valid }">
    <label for="slug" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.post.columns.slug') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.slug" class="form-control" :class="{'form-control-danger': veeErrors.has('slug'), 'form-control-success': this.veeFields.slug && this.veeFields.slug.valid}" id="slug" name="slug" placeholder="{{ trans('admin.post.columns.slug') }}">
        <div v-if="veeErrors.has('slug')" class="form-control-feedback form-text" v-cloak>@{{ veeErrors.first('slug') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': veeErrors.has('type'), 'has-success': this.veeFields.template && this.veeFields.type.valid }">
    <label for="type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Type</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.type" :options="type"
                     :class="{'form-control-danger': veeErrors.has('form.type'), 'form-control-success': this.veeFields.type && this.veeFields.type.valid}"
                     id="type" name="type" placeholder="Type">
        </multiselect>
        <div v-if="veeErrors.has('type')" class="form-control-feedback form-text" v-cloak>@{{ veeErrors.first('type') }}</div>
    </div>
</div>

<div v-show="isType('hero')" class="form-group row align-items-center" :class="{'has-danger': veeErrors.has('hero'), 'has-success': this.veeFields.template && this.veeFields.hero.valid }">
    <label for="type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Chose Hero</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.hero" :options="{{$heroes->toJson()}}"
                     :class="{'form-control-danger': veeErrors.has('form.hero'), 'form-control-success': this.veeFields.hero && this.veeFields.hero.valid}"
                     id="hero_id" track-by="id" name="hero_id" label="slug" placeholder="Chose hero">
        </multiselect>
        <div v-if="veeErrors.has('hero')" class="form-control-feedback form-text" v-cloak>@{{ veeErrors.first('hero') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': veeErrors.has('published_at'), 'has-success': this.veeFields.published_at && this.veeFields.published_at.valid }">
    <label for="published_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.post.columns.published_at') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.published_at" :config="date_config" class="flatpickr" :class="{'form-control-danger': veeErrors.has('published_at'), 'form-control-success': this.veeFields.published_at && this.veeFields.published_at.valid}" id="published_at" name="published_at" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="veeErrors.has('published_at')" class="form-control-feedback form-text" v-cloak>@{{ veeErrors.first('published_at') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': veeErrors.has('enabled'), 'has-success': this.veeFields.enabled && this.veeFields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            {{ trans('admin.post.columns.enabled') }}
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="veeErrors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ veeErrors.first('enabled') }}</div>
    </div>
</div>
<div class="col-md-12">
    <h2>Meta data </h2>
    <div class="form-group row align-items-center">
        <label for="content" class="col-form-label text-md-right col-md-2">Description</label>
        <div class="col-md-9 col-xl-8">
            <textarea type="text" rows="2" v-model="form.description"
                      class="form-control" id="description_content"
                      name="description_content" placeholder="{{ trans('admin.meta.columns.content') }}"></textarea>
        </div>
    </div>
    <div class="form-group row align-items-center">
        <label for="content" class="col-form-label text-md-right col-md-2" >Keywords</label>
        <div class="col-md-9 col-xl-8">
            <textarea type="text" rows="2" v-model="form.keywords"
                      class="form-control" id="keywords_content"
                      name="keywords_content" placeholder="{{ trans('admin.meta.columns.content') }}"></textarea>
        </div>
    </div>
</div>

<plekan :type="form.type">
</plekan>
