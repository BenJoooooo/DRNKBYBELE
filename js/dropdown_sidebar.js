$(document).ready(function () {
    $(document).on('click', '.show-dropdown', function () {
        $('.order-status-dropdown').toggleClass('show ')
    });

    $(document).on('click', '.show-dropdown-home', function () {
        $('.order-status-dropdown-home').toggleClass('show ')
    });

    $(document).on('click', '.show-dropdown-accounts', function () {
        $('.order-status-dropdown-accounts').toggleClass('show ')
    });

    $(document).on('click', '.show-dropdown-sales', function () {
        $('.order-status-dropdown-sales').toggleClass('show ')
    });
});