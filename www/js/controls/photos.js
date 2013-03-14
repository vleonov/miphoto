$(document).ready(
    function() {
        return PhotoControls.init();
    }
);

var PhotoControls = {

    $cPhotos: null,
    $cPhoto: null,
    $form: null,

    init: function()
    {
        this.$cPhotos = $('.c-photos');
        this.$cPhoto = $('.c-photo');
        this.$form = $('#f-photos');

        $('.c-photos .c-star').click(function() {
            PhotoControls.doStar();
        });
        $('.c-photos .c-remove').click(function() {
            PhotoControls.doRemove();
        })
    },

    toggle: function()
    {
        this.$cPhotos.toggle();
        this.$cPhoto.toggle();
    },

    doStar: function()
    {
        $.ajax(
            this.$form.attr('action'),
            {
                cache: false,
                data: this.$form.serialize() + '&action=star',
                type: this.$form.attr('method'),
                dataType: 'json'
            }
        ).done(function(data) {
            if (data.message !== undefined) {
                Message.notify(data.message);
            }
        }).fail(function() {
            Message.alarm('Не удалось сохранить фотографии');
        });
    }


}