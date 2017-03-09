<section>
    <div class="container">
        <h3>Error Message</h3>
        <pre>{!! $exception->getMessage() !!}</pre>
        <h3>Error File</h3>
        <pre>{!! $exception->getFile() !!}</pre>
        <h3>Error Trace</h3>
        <pre>{{ json_encode($exception->getTrace(), JSON_PRETTY_PRINT) }}</pre>
    </div>
</section>