<div class="form-group row align-items-center" >
    <label for="slug" class="col-form-label text-md-right col-md-2" >{{ trans('admin.setting.columns.slug') }}</label>
        <div class="col-md-9 col-xl-8">
        <input type="text" v-model="form.slug" v-validate="''" @input="validate($event)"
               class="form-control" id="slug" name="slug" placeholder="{{ trans('admin.setting.columns.slug') }}">
    </div>
</div>
<vue-form-generator :schema="schema" :model="form.fields" ></vue-form-generator>


