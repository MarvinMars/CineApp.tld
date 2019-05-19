@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.setting.actions.index'))

@section('body')

    <setting-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/settings') }}'"
        inline-template>

        <div class="row">
            <div class="col" v-for="(item, index) in collection">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="/img/thumbnails/footer2.jpg" alt="footer image">
                    <div class="card-body">
                        <h5 class="card-title" v-text="item.slug"></h5>
                        <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </setting-listing>

@endsection