@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.menu.actions.edit', ['name' => $menu->id]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <menu-form
                :action="'{{ $menu->resource_url }}'"
                :data="{{ $menu->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.menu.actions.edit', ['name' => $menu->id]) }}
                    </div>

                    <div class="card-body">

                        @include('admin.menu.components.form-elements')

                    </div>

                    <div class="card-footer">
	                    <button type="submit" class="btn btn-primary" :disabled="submiting">
		                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
		                    {{ trans('brackets/admin-ui::admin.btn.save') }}
	                    </button>
                    </div>

                </form>

        </menu-form>

    </div>

</div>

@endsection