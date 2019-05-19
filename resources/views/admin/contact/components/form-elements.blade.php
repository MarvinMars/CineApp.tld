<div class="form-group row align-items-center" :class="{'has-danger': veeErrors.has('name'), 'has-success': this.veeFields.name && this.veeFields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contact.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': veeErrors.has('name'), 'form-control-success': this.veeFields.name && this.veeFields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.contact.columns.name') }}">
        <div v-if="veeErrors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ veeErrors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': veeErrors.has('email'), 'has-success': this.veeFields.email && this.veeFields.email.valid }">
    <label for="email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contact.columns.email') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'required|email'" @input="validate($event)" class="form-control" :class="{'form-control-danger': veeErrors.has('email'), 'form-control-success': this.veeFields.email && this.veeFields.email.valid}" id="email" name="email" placeholder="{{ trans('admin.contact.columns.email') }}">
        <div v-if="veeErrors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ veeErrors.first('email') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': veeErrors.has('company'), 'has-success': this.veeFields.company && this.veeFields.company.valid }">
    <label for="company" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contact.columns.company') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.company" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': veeErrors.has('company'), 'form-control-success': this.veeFields.company && this.veeFields.company.valid}" id="company" name="company" placeholder="{{ trans('admin.contact.columns.company') }}">
        <div v-if="veeErrors.has('company')" class="form-control-feedback form-text" v-cloak>@{{ veeErrors.first('company') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': veeErrors.has('project_details'), 'has-success': this.veeFields.project_details && this.veeFields.project_details.valid }">
    <label for="project_details" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contact.columns.project_details') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.project_details" v-validate="'required'" id="project_details" name="project_details" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="veeErrors.has('project_details')" class="form-control-feedback form-text" v-cloak>@{{ veeErrors.first('project_details') }}</div>
    </div>
</div>


