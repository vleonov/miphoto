var Message = {

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
        $('.b-messages .e-message')
            .html(msg)
            .removeClass('m-alarm')
            .removeClass('m-notify')
            .addClass(modifier);
    }
}