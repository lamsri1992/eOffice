<script>
$('.ajaxModal').click(function() {
    var id = $(this).attr('data-id');
    $.ajax({
        url: "pages/unithead/unithead_leave.php?id=" + id,
        cache: false,
        success: function(result) {
            $('#ajaxLeave').html(result);
        }
    });
});
</script>