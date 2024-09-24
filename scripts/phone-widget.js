// scripts/phone-widget.js
if (window.addEventListener) {
    window.addEventListener('load', function() {
        zadarmaWidgetFn(
            'c69ec05795c4e3a004ae', 
            '89075', 
            'square', 
            'es', 
            true, 
            {right: '10px', bottom: '5px'}
        );
    }, false);
} else if (window.attachEvent) {
    window.attachEvent('onload', function() {
        zadarmaWidgetFn(
            'c69ec05795c4e3a004ae', 
            '89075', 
            'square', 
            'es', 
            true, 
            {right: '10px', bottom: '5px'}
        );
    });
}
