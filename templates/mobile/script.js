$(document).ready(function () {
    if (document.dmbgeo_catalog_sort !== undefined) {
        $(document).on('click', '#' + document.dmbgeo_catalog_sort.VAR_COOKIE_NAME + '  a', function (e) {
            e.preventDefault();
            if ($(this).attr('data-sort-active') == 1) {
                $('#' + document.dmbgeo_catalog_sort.VAR_COOKIE_NAME + ' a').removeClass('active');
                $('#' + document.dmbgeo_catalog_sort.VAR_COOKIE_NAME + ' a').attr('data-sort-active',0);
                setCookie(document.dmbgeo_catalog_sort.VAR_COOKIE_NAME, -1);
            }
            else {
                $('#' + document.dmbgeo_catalog_sort.VAR_COOKIE_NAME + ' a').removeClass('active');
                $('#' + document.dmbgeo_catalog_sort.VAR_COOKIE_NAME + ' a').attr('data-sort-active',0);
                $(this).addClass('active');
                $(this).attr('data-sort-active',1);
                setCookie(document.dmbgeo_catalog_sort.VAR_COOKIE_NAME, $(this).attr('data-sort-value'));
            }
            window.location.reload();
        });
        $(document).on('click', '#' + document.dmbgeo_catalog_sort.VAR_COOKIE_NAME + ' .default', function () {
            $('#' + document.dmbgeo_catalog_sort.VAR_COOKIE_NAME + ' a').removeClass('active');
            setCookie(document.dmbgeo_catalog_sort.VAR_COOKIE_NAME, -1);
            window.location.reload();
        });
    }
});


function setCookie(name, value, options) {
    options = options || {};

    var expires = options.expires;

    if (typeof expires == "number" && expires) {
        var d = new Date();
        d.setTime(d.getTime() + expires * 1000);
        expires = options.expires = d;
    }
    if (expires && expires.toUTCString) {
        options.expires = expires.toUTCString();
    }

    value = encodeURIComponent(value);

    var updatedCookie = name + "=" + value;

    for (var propName in options) {
        updatedCookie += "; " + propName;
        var propValue = options[propName];
        if (propValue !== true) {
            updatedCookie += "=" + propValue;
        }
    }

    document.cookie = updatedCookie;
}