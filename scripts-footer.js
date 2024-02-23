(function ($) {
  $(document).ready(() => {
    // Add Register Link to WooCommerce Login Form
    $('.woocommerce-form-login').append('<p><a href="/register">New User? Register Here.</a></p>');
    // Show Search Form On Click - Search Icon
    $('#search-icon').on('click', () => {
      $('#search-form').addClass('block-form');
    });
    // Hide Search Form On Click - Search Close Icon
    $('#search-close').on('click', () => {
      $('#search-form').removeClass('block-form');
    });

    // gallery filter page
    $('#gallery-page-filter li').click(function () {
      var filterValue = $(this).attr('data-filter-button');
      $('.card').hide(); // Hide all posts initially

      if (filterValue === 'All') {
        $('.card').show(); // Show all posts if "All" is selected
      } else {
        $('.card').each(function () {
          var itemCategories = $(this).attr('data-gallery-page-filter').split(', ');
          if (itemCategories.includes(filterValue)) {
            $(this).show(); // Show the posts that match the filter
          }
        });
      }
    });
  });
})(jQuery);
