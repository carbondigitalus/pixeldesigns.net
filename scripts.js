(function ($) {
  $(document).ready(() => {
    // Add Register Link to WooCommerce Login Form
    $('.woocommerce-form-login').append('<p><a href="/register">New User? Register Here.</a></p>');
    // Hide Search Form On Load
    $('#search-icon').on('click', () => {
      $('#search-form').addClass('block-form');
    });
  });
})(jQuery);
