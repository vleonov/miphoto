var Message = {

    timer: null,

    alarm: function(msg)
    {
        this._setMessage(msg, 'm-alarm');
    },

    notify: function(msg)
    {
        this._setMessage(msg, 'm-notify');
    },

    _setMessage: function(msg, modifier)
    {
        if (this.timer) {
            clearTimeout(this.timer);
        }

        $('.b-messages').show();
        $('.b-messages .e-message')
            .html(msg)
            .removeClass('m-alarm')
            .removeClass('m-notify')
            .addClass(modifier);

        this.timer = setTimeout(function() {
            $('.b-messages').hide();
        }, 8000);
    }
}