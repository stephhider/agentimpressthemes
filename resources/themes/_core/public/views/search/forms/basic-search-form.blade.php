<form class="search-form" action="{{ url('search') }}" v-on:submit.prevent="search($event)"`>
    <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-default" v-on:click="toggleSearchType">
            <input type="radio" name="type" id="all" value=""> All
        </label>
        <label class="btn btn-default" v-on:click="toggleSearchType">
            <input type="radio" name="type" id="residential" value="residential"> For Sale
        </label>
        <label class="btn btn-default" v-on:click="toggleSearchType">
            <input type="radio" name="type" id="rental" value="rental"> For Rent
        </label>
        @include('search.partials.filter-search-btn')
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="input-group">
                <input type="text" class="cities form-control" name="location" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default" type="button"><i class="fa fa-search"></i> Search <span class="type-search-item hidden-sm hidden-xs">{{ str_plural($listing_type) }} @{{ type_text }}</span></button>
                </span>
            </div>
        </div>
    </div>
</form>
<small><a class="pull-right" href="#advanced-search-modal" data-toggle="modal" data-target="#advanced-search-modal">Advanced</a></small>
@push('modals')
<div class="modal fade left" id="advanced-search-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                @include('search.forms.advanced-search-form')
            </div>
        </div>
    </div>
</div>
@endpush
