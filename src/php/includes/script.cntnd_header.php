<script src="https://cdn.jsdelivr.net/gh/cntnd/core_style@1.1.1/dist/core_script.min.js"></script>
<script>
$(document).ready(function(){
    if (cntnd_header===undefined) {
        var values = [];
        $('.index_error').hide();
        $('.cntnd_header-index').each(function () {
            var uuid = $(this).attr('data-uuid');
            console.log(uuid, this.value, values, values.includes(this.value))
            if (!values.includes(this.value)) {
                values.push(this.value)
            } else {
                $('.index_error[data-uuid=' + uuid + ']').show();
            }
        });
    }
    var cntnd_header = true;
});
</script>
