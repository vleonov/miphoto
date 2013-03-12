$(document).ready(
    function() {
        return PhotoControls.init();
    }
);

var PhotoControls = {

    $cPhotos: null,
    $cPhoto: null,

    init: function()
    {
        this.$cPhotos = $('.c-photos');
        this.$cPhoto = $('.c-photo');
    },

    toggle: function()
    {
        this.$cPhotos.toggle();
        this.$cPhoto.toggle();
    }

}