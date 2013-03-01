$(document).ready(
    function() {
        $(document).keydown(function(e) {
            Control.keyDown(e);
        })
    }
);

var Control = {

    keyDown: function(event)
    {
        console.log(event.keyCode);
        switch (event.keyCode) {
            case 27: // esc
                Gallery.close();
                break;
            case 37: // left
                Gallery.prev();
                break;
            case 39:
                Gallery.next();
                break;

        }
    }
}