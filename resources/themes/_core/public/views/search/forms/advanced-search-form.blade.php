<form class="search-form" action="{{ url('search') }}" v-on:submit.prevent="search($event)">
    <div class="row-fluid">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="location">City, State or Zip</label>
                    <input type="text" class="cities form-control" placeholder="City or Zip" name="location">
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="neighborhood">neighborhood</label>
                    <input type="text" class="mls form-control" placeholder="Oak Tree" name="neighborhood">
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="mls">MLS#</label>
                    <input type="number" class="mls form-control" placeholder="123456" name="mls">
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xs-6 form-group">
                    <label for="minbeds">Minimum Bedrooms</label>
                    <input id="minbeds" name="minbeds" class="min form-control" type="number">
                </div>
                <div class="col-xs-6 form-group">
                    <label for="maxbeds">Maximum Bedrooms</label>
                    <input id="maxbeds" name="maxbeds" class="max form-control" type="number">
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xs-6 form-group">
                    <label for="minbaths">Minimum Bathrooms</label>
                    <input id="minbaths" name="minbaths" class="min form-control" type="number">
                </div>
                <div class="col-xs-6 form-group">
                    <label for="maxbaths">Maximum Bathrooms</label>
                    <input id="maxbaths" name="maxbaths" class="max form-control" type="number">
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xs-6 form-group">
                    <label for="minprice">Minimum Price</label>
                    <input id="minprice" name="minprice" class="min form-control money-mask" type="text">
                </div>
                <div class="col-xs-6 form-group">
                    <label for="maxprice">Maximum Price</label>
                    <input id="maxprice" name="maxprice" class="max form-control money-mask" type="text">
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xs-6 form-group">
                    <label for="minarea">Minimum SQFT</label>
                    <input id="minarea" name="minarea" class="min form-control comma-mask" type="text">
                </div>
                <div class="col-xs-6 form-group">
                    <label for="maxarea">Maximum SQFT</label>
                    <input id="maxarea" name="maxarea" class="max form-control comma-mask" type="text">
                </div>
            </div>
        </div>
        <div class="col-xs-12 form-group">
            <button type="submit" class="btn btn-default pull-right"><i class="fa fa-search"></i> Search</button>
        </div>
    </div>
</form>
