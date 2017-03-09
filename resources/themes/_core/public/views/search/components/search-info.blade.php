<search-info inline-template>
    <h4 v-show="showInfoMessage" class="subsection-heading">We Found @{{ total.toLocaleString('en') }} {{ str_plural($listing_type) }} Matching Your Criteria. <br>
        <small>
            <span class="label label-default" v-for="(val, key) in readableQueryData">@{{ readable[key] }}: @{{ val | capitalize }}
                <span class="remove-item tooltipper" data-placement="bottom" title="Remove">
                    <i class="fa fa-times-circle" @click="removeParameter(key)"></i>
                </span>
            </span>
        </small>
    </h4>
</search-info>
