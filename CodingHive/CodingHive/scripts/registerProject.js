function register_next_step(obj, send) {
    var f=$(obj).parents(".form");
    var b=$(obj).parents(".block");
    var n=$(obj).parents(".block").next('.block');
    var error=0;
    $("input").removeClass('error');
    f=$(f).find("input");

    $(f).each(function(index, element) {
        if (!$(this).val()) {
            $(this).addClass('error');
            error=1;
        }
    });

    if (!error && $(b)){
        if (send != 1) {
            $(n).show(50);
            $(b).hide(50);
        } else {
            $(b).parents('form').submit();

        }
    }
}

$(function() {
    $( ".selectableTechs" ).on("mousedown", function(e) {
        e.metaKey = true;
    }).selectable();
});