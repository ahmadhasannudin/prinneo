<script>
    $(document).ready(function() {

        const getClickableLink = link => {
            return link.startsWith("http://") || link.startsWith("https://") ?
                link :
                `http://${link}`;
        };

        if ($('#modal-pupup [name="popup_status"]').val() == 'true') {
            link = getClickableLink($('#modal-pupup [name="popup_link"]').attr('href'));
            $('#modal-pupup [name="popup_link"]').attr('href', link);
            $('#modal-pupup').modal('toggle');
        }
    });
</script>