@section('script')

<script src="{{url('index/vendors/jquery/dist/jquery.min.js')}}"></script>
<script src="{{url('index/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{url('index/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{url('index/assets/js/main.js')}}"></script>
<script src="{{url('index/vendors/chosen/chosen.jquery.min.js')}}"></script>



<script src="{{url('index/vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
<script src="{{url('index/"assets/js/dashboard.js')}}"></script>
<script src="{{url('index/assets/js/widgets.js')}}"></script>
<script src="{{url('index/vendors/jqvmap/dist/jquery.vmap.min.js')}}"></script>
<script src="{{url('index/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
<script src="{{url('index/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>


<script src="{{url('index/vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
<script src="{{url('index/assets/js/init-scripts/chart-js/chartjs-init.js')}}"></script>

<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>


<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>

<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>

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
                url: "{{url('search/searchNote.php')}}",
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
    function readURL(input){
        if(input.files && input.files[0]){
            let reader = new FileReader();
            reader.onload = function(e){
                jQuery('#target_image').attr('src',e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    jQuery('#change_image').change(function(){
        readURL(this);
    });
</script>
<script>
    jQuery(document).ready(function() {
        jQuery( "#datepicker" ).datepicker();
        jQuery( "#datepickers" ).datepicker();
    });
</script>


@stop