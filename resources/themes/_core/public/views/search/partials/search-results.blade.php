<div v-cloak class="container">
    <div v-bind:class="listingsStatusClass">
        <div id="search-results" class="row" data-xs="1-480" data-sm="1-768" data-md="2-992" data-lg="2-1200" data-xl="3-1600" v-el:search>
            @include('listings.partials.well')
        </div>
        <div class="row">
            <div class="col-sm-12">
                <button v-show="loading" class="btn btn-default wow fadeIn"><i class="fa fa-circle-o-notch fa-spin fa-fw margin-bottom"></i> Loading...</button>
                <button v-show="(addedCount == (limit * limitOffset)) && !loading && !allListingsLoaded" class="btn btn-default wow fadeIn" v-on:click="updateListings">Load Next @{{ limit * limitOffset }} out of @{{ total }}</button>
            </div>
        </div>
        <p v-show="!loading && allListingsLoaded">No more listings...</p>
    </div>
</div>
