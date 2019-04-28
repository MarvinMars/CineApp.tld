@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.comment.actions.edit', ['name' => $comment->id]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <comment-form
                :action="'{{ $comment->resource_url }}'"
                :data="{{ $comment->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.comment.actions.edit', ['name' => $comment->id]) }}
                    </div>

                    <div class="card-body">

                        @include('admin.comment.components.form-elements')

                    </div>

                    <div class="card-footer">
	                    <button type="submit" class="btn btn-primary" :disabled="submiting">
		                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
		                    {{ trans('brackets/admin-ui::admin.btn.save') }}
	                    </button>
                    </div>

                </form>

        </comment-form>

    </div>

</div>

@endsection