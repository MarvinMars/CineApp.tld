@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.film.actions.edit', ['name' => $film->title]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <film-form
                :action="'{{ $film->resource_url }}'"
                :data="{{ $film->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.film.actions.edit', ['name' => $film->title]) }}
                    </div>

                    <div class="card-body">

                        @include('admin.film.components.form-elements')
                        @include('brackets/admin-ui::admin.includes.media-uploader', [
                                                                        'mediaCollection' => app(App\Models\Film::class)->getMediaCollection('gallery'),
                                                                        'media' => $film->getThumbs200ForCollection('gallery'),
                                                                        'label' => 'Gallery'
                                                                    ])
                        @include('brackets/admin-ui::admin.includes.media-uploader', [
                                                 'mediaCollection' => app(App\Models\Film::class)->getMediaCollection('poster'),
                                                 'media' => $film->getThumbs200ForCollection('poster'),
                                                 'label' => 'Poster'
                                             ])
                        @include('brackets/admin-ui::admin.includes.media-uploader', [
                                             'mediaCollection' => app(App\Models\Film::class)->getMediaCollection('video'),
                                             'label' => 'Video'
                                         ])
                    </div>

                    <div class="card-footer">
	                    <button type="submit" class="btn btn-primary" :disabled="submiting">
		                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
		                    {{ trans('brackets/admin-ui::admin.btn.save') }}
	                    </button>
                    </div>

                </form>

        </film-form>

    </div>

</div>

@endsection