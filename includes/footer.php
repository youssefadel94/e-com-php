<script>
    
function detailsmodal(ID){
    var data = {"ID" : ID};
    jQuery.ajax({
        url: <?= BASEURL;?>+'./includes/detailsmodel.php',
    method: "post",
    data: data,
    success: function (data) {
        jQuery('body').append(data);
        jQuery('#details-modal').modal('toggle')
    },
    error: function () { 
        alert('shomething not right');
    }

});

}
</script>
</body>
</html>