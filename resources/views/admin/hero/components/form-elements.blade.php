<div class="form-group row align-items-center" :class="{'has-danger': veeErrors.has('template'), 'has-success': this.veeFields.template && this.veeFields.template.valid }">
    <label for="template" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Template</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.template" :options="template_select"
                     :class="{'form-control-danger': veeErrors.has('form.template'), 'form-control-success': this.veeFields.template && this.veeFields.template.valid}"
                     id="template" name="template" placeholder="Template">
        </multiselect>
        <div v-if="veeErrors.has('template')" class="form-control-feedback form-text" v-cloak>@{{ veeErrors.first('template') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': veeErrors.has('slug'), 'has-success': this.veeFields.slug && this.veeFields.slug.valid }">
    <label for="slug" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.hero.columns.slug') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.slug" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': veeErrors.has('slug'), 'form-control-success': this.veeFields.slug && this.veeFields.slug.valid}" id="slug" name="slug" placeholder="{{ trans('admin.hero.columns.slug') }}">
        <div v-if="veeErrors.has('slug')" class="form-control-feedback form-text" v-cloak>@{{ veeErrors.first('slug') }}</div>
    </div>
</div>
<div class="col-md-12">
    <h2>Slides
        <span class="float-right">
               <button type="button"
                       @click="show = !show"
                       class="btn btn-warning"
               >
                   <i class="fa" :class=" show? 'fa-compress' : 'fa-expand' "></i>
               </button>
        </span>
    </h2>
    <hr>
    <div class="col-md-12" v-if="form.slides.length">
        <draggable v-model="form.slides" group="slides" @start="drag=true" @end="drag=false">
            <div class="card" v-for="(slide,index) in form.slides" v-if="slide" :key="slide.id">
                <div class="card-header">
                    <button type="button" @click="CopySlide(slide)" class="btn btn-sm btn-primary"><i class="fa fa-copy"></i></button>
                    <button type="button" @click="RemoveSlide(index)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                    <span v-text="slide.slug || ''"></span>
                </div>
                <div class="card-body">
                    <vue-form-generator v-show="show" :schema="SwitchTemplate()" :model="slide" :key="slide.id" ></vue-form-generator>
                </div>
            </div>
        </draggable>
    </div>
    <div class="col-md-12">
        <button @click="AddSlide" type="button" class="btn btn-block btn-primary"><i class="fa fa-plus"></i></button>
    </div>
</div>