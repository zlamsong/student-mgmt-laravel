jQuery(document).ready(function() {
    setTimeout(function () {
        jQuery('.alert').hide('slow');
    },2000);

    jQuery(".standardSelect").chosen({
        disable_search_threshold: 10,
        no_results_text: "Oops, nothing found!",
        width: "100%"
    });
});