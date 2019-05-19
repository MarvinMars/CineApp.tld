@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.slide.actions.edit', ['name' => $slide->slug]))

@section('body')

    <div class="container-xl">
        <div class="card">
            <slide-form
                    action="{{ $slide->resource_url }}"
                    :data="{{ $slide->toJson() }}"
                    inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action"
                      novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.slide.actions.edit', ['name' => $slide->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.slide.components.form-elements', ['slide' => $slide] )
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>

                </form>
            </slide-form>

        </div>

    </div>

@endsection
