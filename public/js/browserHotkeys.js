function browserHotkeys() {
    $(window).keydown(
        function(e){
            if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)){
                e.preventDefault();
            }
            Mousetrap.bind('ctrl+s', function() {
                $('#save').click();
            });

            if(e.ctrlKey && e.keyCode == 'J'.charCodeAt(0)){
                e.preventDefault();
            }
            Mousetrap.bind('ctrl+j', function() {
                $('#skip')[0].click();
            });
        }
    );
}
