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
            if (data.historyId !== undefined) {
                msg = 'Фотографии отмечены как хорошие,' +
                    ' <a href="/history/cancel/' + data.historyId + '">отменить</a>' +
                    ' или <a href="">обновить страницу</a>.';
                Message.notify(msg);
            }
        }).fail(function() {
            Message.alarm('Не удалось сохранить фотографии');
        });
    },

    doRemove: function()
    {
        $.ajax(
            this.$form.attr('action'),
            {
                cache: false,
                data: this.$form.serialize() + '&action=remove',
                type: this.$form.attr('method'),
                dataType: 'json'
            }
        ).done(function(data) {
            if (data.historyId !== undefined) {
                msg = 'Фотографии удалены,' +
                    ' <a href="/history/cancel/' + data.historyId + '">отменить</a>' +
                    ' или <a href="">обновить страницу</a>.';
                Message.notify(msg);
            }
        }).fail(function() {
            Message.alarm('Не удалось удалить фотографии');
        });
    }


}