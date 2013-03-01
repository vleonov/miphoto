$(document).ready(
    function() {
        Gallery.init();
    }
);
var Gallery = {

    $modal: null,
    $img: null,
    $a: null,
    padding: 20,
    isOpened: false,
    $aCurrent: null,
    $aNext: null,
    $aPrev: null,

    init: function()
    {
        $('.photos a').click(
            function() {
                return Gallery.show(this);
            }
        );

        this.$modal = $('.modal');
        this.$img = $('img', this.$modal);
        this.$a = $('a', this.$modal);
    },

    show: function(a)
    {
        var $a = $(a),
            preview = $a.attr('data-preview');

        if (preview === undefined) {
            return true;
        }

        this.$img.attr('src', preview);
        this.$a.attr('href', $a.attr('href'));
        this.$modal.modal();
        this.isOpened = true;

        img = new Image();
        img.src = preview;
        img.onload = function() {
          Gallery.resize(this.width, this.height);
        }

        this.$aCurrent = $a;
        this.$aNext = $('a', this.$aCurrent.parent().next());
        this.$aPrev = $('a', this.$aCurrent.parent().prev());

        return false;
    },

    resize: function(iWidth, iHeight)
    {
        var wWidth = $(window).innerWidth(),
            wHeight = $(window).innerHeight(),
            ipWidth = iWidth+this.padding*2,
            ipHeigh = iHeight+this.padding*2,
            width,
            height,
            wDiff,
            hDiff;

        if (ipWidth > wWidth || ipHeigh > wHeight) {
            wDiff = ipWidth - wWidth;
            hDiff = ipHeigh - wHeight;

            if (wDiff > hDiff) {
                width = wWidth - this.padding*2;
                height = iHeight * (width / iWidth);
            } else {
                height = wHeight - this.padding*2;
                width = iWidth * (height / iHeight);
            }
        } else {
            width = iWidth;
            height = iHeight;
        }

        this.$modal.css('width', width+'px');
        this.$modal.css('height', height+'px');
        this.$modal.css('margin', this.padding+'px');
        this.$modal.css('top', (wHeight-height)/2 - this.padding + 'px');
        this.$modal.css('left', (wWidth-width)/2 - this.padding + 'px');
    },

    close: function()
    {
        if (this.isOpened) {
            this.$modal.modal('hide');
            this.isOpened = false;
        }
    },

    next: function()
    {
        if (this.isOpened && this.$aNext.length) {
            this.show(this.$aNext);
        }
    },

    prev: function()
    {
        if (this.isOpened && this.$aPrev.length) {
            this.show(this.$aPrev);
        }
    }
}