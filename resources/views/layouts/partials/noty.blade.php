<script src="{{ asset('js/plugins/noty.js') }}"></script>
@if (Session::has('flash_notification.message'))
    <script>
        noty({
            type: '{{ Session::get('flash_notification.level') }}',
            layout: 'bottomRight',
            text: '{{ Session::get('flash_notification.message') }}',
            timeout: 5000
        });
    </script>
@endif
