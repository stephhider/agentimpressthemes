<div class="btn-group">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa" :class="sort.icon"></i> @{{ sort.label }}
    </button>
    <ul class="dropdown-menu dropdown-menu-right sort-list">
        <li>
            <a href="#" @click.prevent="filter('-listprice', 'Price (Highest - Lowest)', 'desc', $event)">Price (Highest - Lowest)</a>
        </li>
        <li>
            <a href="#" @click.prevent="filter('listprice', 'Price (Lowest - Highest)', 'asc', $event)">Price (Lowest - Highest)</a>
        </li>
        <li role="separator" class="divider"></li>
        <li>
            <a href="#" @click.prevent="filter('-listdate', 'Age (Newest - Oldest)', 'desc', $event)">Age (Newest - Oldest)</a>
        </li>
        <li>
            <a href="#" @click.prevent="filter('listdate', 'Age (Oldest - Newest)', 'asc', $event)">Age (Oldest - Newest)</a>
        </li>
        <li role="separator" class="divider"></li>
        <li>
            <a href="#" @click.prevent="filter('-beds', 'Beds (Most - Least)', 'desc', $event)">Beds (Most - Least)</a>
        </li>
        <li>
            <a href="#" @click.prevent="filter('beds', 'Beds (Least - Most)', 'asc', $event)">Beds (Least - Most)</a>
        </li>
        <li role="separator" class="divider"></li>
        <li>
            <a href="#" @click.prevent="filter('-baths', 'Baths (Most - Least)', 'desc', $event)">Baths (Most - Least)</a>
        </li>
        <li>
            <a href="#" @click.prevent="filter('baths', 'Baths (Least - Most)', 'asc', $event)">Baths (Least - Most)</a>
        </li>
        <li role="separator" class="divider"></li>
        <li>
            <a href="#" @click.prevent="filter(false)">Remove Filter</a>
        </li>
    </ul>
</div>
