<div class="form-group row align-items-center"
     :class="{'has-danger': veeErrors.has('slug'), 'has-success': this.veeFields.slug && this.veeFields.slug.valid }">
    <label for="slug" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.slide.columns.slug') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.slug" v-validate="'required'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': veeErrors.has('slug'), 'form-control-success': this.veeFields.slug && this.veeFields.slug.valid}"
               id="slug" name="slug" placeholder="{{ trans('admin.slide.columns.slug') }}">
        <div v-if="veeErrors.has('slug')" class="form-control-feedback form-text" v-cloak>@{{ veeErrors.first('slug') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': veeErrors.has('template'), 'has-success': this.veeFields.slides && this.veeFields.slides.valid }">
    <label for="property" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.slide.columns.chose_template') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.template" :options="['homepage','work']"
                     :class="{'form-control-danger': veeErrors.has('form.template'), 'form-control-success': this.veeFields.template && this.veeFields.template.valid}"
                     id="template" name="template" placeholder="{{ trans('admin.slide.columns.chose_template') }}"
                     require @input="updateSelected"
        ></multiselect>
        <div v-if="veeErrors.has('template')" class="form-control-feedback form-text" v-cloak>
            @{{ veeErrors.first('template') }}
        </div>
    </div>
</div>

<div v-if="checkTemplate('homepage')">
    <div class="form-group row align-items-center">
        <label class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"
               for="title">{{ trans('admin.slide.field.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <input class="form-control has-success" type="text" v-model='form.fields.title' id="title" name="title"/>
        </div>
    </div>
    <div class="form-group row align-items-center">
        <label class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"
               for="description">{{ trans('admin.slide.field.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <quill-editor v-model='form.fields.description' id="description" name="description"
                          :options="wysiwygConfig">
            </quill-editor>
        </div>
    </div>
    <div class="form-group row align-items-center">
        <label class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"
               for="year">{{ trans('admin.slide.field.year') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <input class="form-control has-success" type="number" v-model='form.fields.year' id="year" name="year"/>
        </div>
    </div>
    <div class="form-group row align-items-center">
        <label class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"
               for="work_done">{{ trans('admin.slide.field.work_done') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <quill-editor v-model='form.fields.work_done' id="work_done" name="work_done" :options="wysiwygConfig">
            </quill-editor>
        </div>
    </div>
    <div class="form-group row align-items-center">
        <label class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"
               for="website">{{ trans('admin.slide.field.website') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <input type="text" class="form-control has-success" v-model='form.fields.website' id="website"
                   name="website"/>
        </div>
    </div>
    <div class="form-group row align-items-center">
        <label class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"
               for="website">Background Color (HEX color)</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <input type="text" class="form-control has-success" v-model='form.fields.background_color'
                   id="background_color"
                   name="background_color"/>
        </div>
    </div>
</div>
<div v-if="checkTemplate('work')">
    <div class="form-group row align-items-center">
        <label class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"
               for="work_category">Work category</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <input class="form-control has-success" type="text" v-model='form.fields.work_category' id="work_category"
                   name="work_category"/>
        </div>
    </div>
    <div class="form-group row align-items-center">
        <label class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"
               for="title">{{ trans('admin.slide.field.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <input class="form-control has-success" type="text" v-model='form.fields.title' id="title" name="title"/>
        </div>
    </div>
    <div class="form-group row align-items-center">
        <label class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"
               for="description">{{ trans('admin.slide.field.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <quill-editor v-model='form.fields.description' id="description" name="description"
                          :options="wysiwygConfig">
            </quill-editor>
        </div>
    </div>
    <div class="form-group row align-items-center">
        <div class="col-md-9 col-xl-8 offset-md-2 offset-xl-2">
            @include('brackets/admin-ui::admin.includes.media-uploader',
            [
              'mediaCollection' => app(App\Models\Slide::class)->getMediaCollection('mobile_image'),
              'media' => $slide->getThumbs200ForCollection('mobile_image'),
              'label' => 'Work Mobile Image (square images)'
            ])
        </div>
    </div>
</div>
<div class="form-group row align-items-center">
    <label class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'" for="website">Project
        link</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" class="form-control has-success" v-model='form.fields.project_link' id="project_link"
               name="project_link"/>
    </div>
</div>

<div class="form-group row align-items-center">
    <div class="col-md-9 col-xl-8 offset-md-2 offset-xl-2">
        @include('brackets/admin-ui::admin.includes.media-uploader',
        [
          'mediaCollection' => app(App\Models\Slide::class)->getMediaCollection('gallery'),
          'media' => $slide->getThumbs200ForCollection('gallery'),
          'label' => 'Main Image'
        ])
    </div>
</div>
