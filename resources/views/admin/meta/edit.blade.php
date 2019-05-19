@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.meta.actions.edit', ['name' => $metum->name]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <meta-form
                :action="'{{ $metum->resource_url }}'"
                :data="{{ $metum->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.meta.actions.edit', ['name' => $metum->name]) }}
                    </div>

                    <div class="card-body">

                        @include('admin.meta.components.form-elements')

                    </div>

                    <div class="card-footer">
	                    <button type="submit" class="btn btn-primary" :disabled="submiting">
		                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
		                    {{ trans('brackets/admin-ui::admin.btn.save') }}
	                    </button>
                    </div>

                </form>

        </meta-form>

    </div>

</div>

@endsection