<search-form cities="{{ json_encode($cities) }}" show_results="{{ $show_results or false }}" inline-template>
    <div>
    <form class="search-form" action="{{ url('search') }}" @submit.prevent="search">
        <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-default" :class="{ active: type == ''}" @click="toggleSearchType">
                <input type="radio" name="type" id="all" value=""> All
            </label>
            <label class="btn btn-default" :class="{ active: type == 'residential'}" @click="toggleSearchType">
                <input type="radio" name="type" id="residential" value="residential"> For Sale
            </label>
            <label class="btn btn-default" :class="{ active: type == 'rental'}" @click="toggleSearchType">
                <input type="radio" name="type" id="rental" value="rental"> For Rent
            </label>
            @include('search.partials.filter-search-btn')
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="input-group">
                    <input type="text" class="cities form-control" name="location" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="fa fa-search"></i> Search <span class="type-search-item hidden-sm hidden-xs">@{{ type_text }} {{ str_plural($listing_type) }}</span>
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </form>
    <small><a class="pull-right" href="#advanced-search-modal" data-toggle="modal" data-target="#advanced-search-modal">Advanced</a></small>
    </div>
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
</search-form>

