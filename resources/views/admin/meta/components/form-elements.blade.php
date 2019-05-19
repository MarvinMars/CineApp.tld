<div class="form-group row align-items-center" :class="{'has-danger': veeErrors.has('name'), 'has-success': this.veeFields.name && this.veeFields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.meta.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': veeErrors.has('name'), 'form-control-success': this.veeFields.name && this.veeFields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.meta.columns.name') }}">
        <div v-if="veeErrors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ veeErrors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': veeErrors.has('content'), 'has-success': this.veeFields.content && this.veeFields.content.valid }">
    <label for="content" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.meta.columns.content') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.content" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': veeErrors.has('content'), 'form-control-success': this.veeFields.content && this.veeFields.content.valid}" id="content" name="content" placeholder="{{ trans('admin.meta.columns.content') }}">
        <div v-if="veeErrors.has('content')" class="form-control-feedback form-text" v-cloak>@{{ veeErrors.first('content') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': veeErrors.has('property'), 'has-success': this.veeFields.property && this.veeFields.property.valid }">
    <label for="property" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.meta.columns.property') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <textarea type="text" rows="5" v-model="form.property"  class="form-control" :class="{'form-control-danger': veeErrors.has('property'), 'form-control-success': this.veeFields.property && this.veeFields.property.valid}" id="property" name="property" placeholder="{{ trans('admin.meta.columns.property') }}"></textarea>
        <div v-if="veeErrors.has('property')" class="form-control-feedback form-text" v-cloak>@{{ veeErrors.first('property') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': veeErrors.has('posts'), 'has-success': this.veeFields.posts && this.veeFields.posts.valid }">
    <label for="property" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.meta.columns.chose_posts') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.posts" :options="{{$posts->toJson()}}"
                     :class="{'form-control-danger': veeErrors.has('form.posts'), 'form-control-success': this.veeFields.posts && this.veeFields.posts.valid}"
                     id="posts" name="posts" placeholder="{{ trans('admin.meta.columns.chose_posts') }}"
                     track-by="id" :multiple="true" :searchable="true" label="slug"
        ></multiselect>
        <div v-if="veeErrors.has('posts')" class="form-control-feedback form-text" v-cloak>@{{ veeErrors.first('posts') }}</div>
    </div>
</div>

