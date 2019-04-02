
@section('script')

<!-- END wrapper -->
<script src="{{url('enlight/js/scripts.min.js')}}"></script>
<script src="{{url('enlight/js/main.min.js')}}"></script>
<script src="{{url('enlight/js/custom.js')}}"></script>
{{--<script>--}}
    {{--$('#exampleModal').on('shown.bs.modal', function () {--}}
        {{--$('#myInput').trigger('focus')--}}
    {{--})--}}
{{--</script>--}}

<script>
    jQuery(document).ready(function () {
        setTimeout(function () {
            jQuery('.alert').hide('slow');
        },2000);

        jQuery('#searchOne').on('keyup', function () {
            let getValue = jQuery(this).val();
            // console.log(getValue);
            jQuery.ajax({
                method: "GET",
                url: "{{url('search/searchOne.php')}}",
                data: {'search_data': getValue},
                success: function (response) {
                    // console.log(response);
                    jQuery('tbody').html(response);
                }
            });

        });

        jQuery('#searchNote').on('keyup', function () {
            let getValue = jQuery(this).val();
            // console.log(getValue);
            jQuery.ajax({
                method: "GET",
                url: "{{route('search-note-get')}}",
                data: {'search_data': getValue},
                success: function (response) {
                    // console.log(response);
                    jQuery('tbody').html(response);
                }
            });

        });

    });
</script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>


</body>
</html>
    @stop

