$(document).ready(
    function() {
        $(document).keydown(function(e) {
            return Control.keyDown(e);
        })
    }
);

var Control = {

    keyDown: function(event)
    {
//        console.log(event.keyCode);
        if (event.altKey || event.ctrlKey || event.shiftKey) {
            return true;
        }

        switch (event.keyCode) {
            case 27: // esc
                return Gallery.close();
            case 37: // left
            case 38: // up
                return Gallery.prev();
            case 39: // right
            case 40: // down
                return Gallery.next();
            case 33: // pgup
                return Gallery.fprev();
            case 34: // pgdown
                return Gallery.fnext();
        }

        return true;
    }
}