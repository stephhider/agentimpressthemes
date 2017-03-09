<div id="client-status-alert" class="alert alert-{{ $config->settings->client_status->type or 'default' }}" role="alert">
    <h4 class="section-heading">{{ $config->settings->client_status->title or '' }} <br> <small>{{ $config->settings->client_status->sub_title or '' }}</small></h4>
    <p>{{ $config->settings->client_status->content or '' }}</p>
    @if (isset($config->settings->client_status->button))
    <a href="{{ $config->settings->client_status->button->href or '' }}" class="btn btn-{{ $config->settings->client_status->type or 'default' }}">{{ $config->settings->client_status->button->title or '' }}</a>
    @endif
</div>
