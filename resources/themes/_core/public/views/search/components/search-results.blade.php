<search-results initial_listings="{{ $listings or [] }}" initial_total="{{ $total or 0 }}" inline-template>
    <div class="container">
        <div :class="listingsStatusClass">
            <div id="search-results" class="row" data-xs="1-480" data-sm="1-768" data-md="2-992" data-lg="2-1200" data-xl="3-1600">
                @include('listings.partials.well')
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <button v-show="loading" class="btn btn-default wow fadeIn">
                        <i class="fa fa-circle-o-notch fa-spin fa-fw margin-bottom"></i> Loading...
                    </button>
                    <button v-show="((addedCount % (limit * limitOffset)) == 0)  && !allListingsLoaded" class="btn btn-default wow fadeIn" @click="updateListings">Load Next @{{ limit * limitOffset }} out of @{{ total }}</button>
                </div>
            </div>
            <p v-show="!loading && allListingsLoaded">No more listings...</p>
        </div>
    </div>
</search-results>
