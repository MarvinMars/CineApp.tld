@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.hero.actions.edit', ['name' => $hero->id]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <hero-form
                :action="'{{ $hero->resource_url }}'"
                :data="{{ $hero->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.hero.actions.edit', ['name' => $hero->id]) }}
                    </div>

                    <div class="card-body">

                        @include('admin.hero.components.form-elements')

                    </div>

                    <div class="card-footer">
	                    <button type="submit" class="btn btn-primary" :disabled="submiting">
		                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
		                    {{ trans('brackets/admin-ui::admin.btn.save') }}
	                    </button>
                    </div>

                </form>

        </hero-form>

    </div>

</div>

@endsection