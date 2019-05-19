<div class="form-group row align-items-center" :class="{'has-danger': veeErrors.has('label'), 'has-success': this.veeFields.label && this.veeFields.label.valid }">
    <label for="label" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.menu.columns.label') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.label" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': veeErrors.has('label'), 'form-control-success': this.veeFields.label && this.veeFields.label.valid}" id="label" name="label" placeholder="{{ trans('admin.menu.columns.label') }}">
        <div v-if="veeErrors.has('label')" class="form-control-feedback form-text" v-cloak>@{{ veeErrors.first('label') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': veeErrors.has('url'), 'has-success': this.veeFields.url && this.veeFields.url.valid }">
    <label for="url" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.menu.columns.url') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.url" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': veeErrors.has('url'), 'form-control-success': this.veeFields.url && this.veeFields.url.valid}" id="url" name="url" placeholder="{{ trans('admin.menu.columns.url') }}">
        <div v-if="veeErrors.has('url')" class="form-control-feedback form-text" v-cloak>@{{ veeErrors.first('url') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': veeErrors.has('type'), 'has-success': this.veeFields.type && this.veeFields.type.valid }">
    <label for="type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.menu.columns.type') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.type" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': veeErrors.has('type'), 'form-control-success': this.veeFields.type && this.veeFields.type.valid}" id="type" name="type" placeholder="{{ trans('admin.menu.columns.type') }}">
        <div v-if="veeErrors.has('type')" class="form-control-feedback form-text" v-cloak>@{{ veeErrors.first('type') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': veeErrors.has('order'), 'has-success': this.veeFields.order && this.veeFields.order.valid }">
    <label for="order" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.menu.columns.order') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.order" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': veeErrors.has('order'), 'form-control-success': this.veeFields.order && this.veeFields.order.valid}" id="order" name="order" placeholder="{{ trans('admin.menu.columns.order') }}">
        <div v-if="veeErrors.has('order')" class="form-control-feedback form-text" v-cloak>@{{ veeErrors.first('order') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': veeErrors.has('parent_id'), 'has-success': this.veeFields.parent_id && this.veeFields.parent_id.valid }">
    <label for="parent_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.menu.columns.parent_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.parent_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': veeErrors.has('parent_id'), 'form-control-success': this.veeFields.parent_id && this.veeFields.parent_id.valid}" id="parent_id" name="parent_id" placeholder="{{ trans('admin.menu.columns.parent_id') }}">
        <div v-if="veeErrors.has('parent_id')" class="form-control-feedback form-text" v-cloak>@{{ veeErrors.first('parent_id') }}</div>
    </div>
</div>


