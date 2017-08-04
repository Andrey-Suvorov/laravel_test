<script src="{{ URL::asset('js/app.js') }}"></script>

<script type="text/javascript">

    $(document).ready(function () {
        $('#check-all-button').on('click', function () {
            if ($(this).hasClass('allChecked')) {
                $('input[type="checkbox"]').prop('checked', false);
            } else {
                $('input[type="checkbox"]').prop('checked', true);
            }
            $(this).toggleClass('allChecked');
        })
    });

</script>


{{--<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}" />--}}
