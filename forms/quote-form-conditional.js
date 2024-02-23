(function ($) {
  $(document).ready(function () {
    // Initialize the state for existing repeater items
    initializeRepeaterItems();
    // check for error box, if present clear the hidden field data
    clearLineItemDataField();

    // Delegate change event for product type select fields in repeater items
    $('.gfield_repeater_items').on('change', 'select[name^="input_1001"]', function () {
      const repeaterItem = $(this).closest('.gfield_repeater_item');
      const selectedProductType = $(this).val();
      handleProductTypeChange(repeaterItem, selectedProductType);
    });

    // Pre-submission actions
    // gform_1
    $('#gform_submit_button_1').on('click', function () {
      console.log('Form is about to be submitted');

      let lineItemData = '';
      const repeaterItems = $('.gfield_repeater_items').children('.gfield_repeater_item');

      $(repeaterItems).each(function (index) {
        const productType = $(this)
          .find('select[name="input_1001[' + index + ']"]')
          .val();
        let productDescription = $(this)
          .find('textarea[name="input_1007[' + index + ']"]')
          .val();
        const productDrinkware = $(this)
          .find('select[name="input_1006[' + index + ']"]')
          .val();
        const productHats = $(this)
          .find('select[name="input_1003[' + index + ']"]')
          .val();
        const productLighting = $(this)
          .find('select[name="input_1005[' + index + ']"]')
          .val();
        const productQuantity = $(this)
          .find('input[name="input_1008[' + index + ']"]')
          .val();

        lineItemData += `Line Item: ${index}\nProduct Type: ${productType}\n`;
        if (productType === 'Drinkware') {
          lineItemData += `Drinkware Product: ${productDrinkware}\n`;
        } else if (productType === 'Hats') {
          lineItemData += `Hats Product: ${productHats}\n`;
        } else if (productType === 'Lighting') {
          lineItemData += `Lighting Product: ${productLighting}\n`;
        }
        lineItemData += `Quantity: ${productQuantity}\nProduct Description: ${productDescription}\n\n`;
      });

      $('textarea#input_1_8').val(lineItemData);
      console.log('Final lineItemData:\n', lineItemData);
    });

    function initializeRepeaterItems() {
      $('.gfield_repeater_items')
        .children('.gfield_repeater_item')
        .each(function () {
          hideAllFieldsExceptProductType($(this));
        });
    }

    function hideAllFieldsExceptProductType(repeaterItem) {
      repeaterItem.find('.gfield_repeater_cell').css('display', 'none');
      repeaterItem.find('.gfield').attr('data-conditional-logic', 'hidden');
      repeaterItem.find('select[name^="input_1001"]').closest('.gfield_repeater_cell').css('display', 'block');
      repeaterItem.find('select[name^="input_1001"]').closest('.gfield').removeAttr('data-conditional-logic');
    }

    function handleProductTypeChange(repeaterItem, selectedProductType) {
      hideAllFieldsExceptProductType(repeaterItem);

      switch (selectedProductType) {
        case 'Drinkware':
          showField(repeaterItem, '#field_1_1006');
          break;
        case 'Hats':
          showField(repeaterItem, '#field_1_1003');
          break;
        case 'Lighting':
          showField(repeaterItem, '#field_1_1005');
          break;
      }
    }

    function showField(repeaterItem, fieldSelector) {
      const productFieldCell = repeaterItem.find(fieldSelector).closest('.gfield_repeater_cell');
      const productField = repeaterItem.find(fieldSelector).closest('.gfield');
      productFieldCell.css('display', 'block');
      productField.removeAttr('data-conditional-logic');

      // Additional logic for second select field, if needed
      const secondSelect = productField.find('select');
      secondSelect.change(function () {
        // Show/hide the textarea and quantity field based on the second select value
        if ($(this).val() === 'Other') {
          repeaterItem.find('#field_1_1007, #field_1_1008').closest('.gfield_repeater_cell').css('display', 'block');
          repeaterItem.find('#field_1_1007, #field_1_1008').closest('.gfield').removeAttr('data-conditional-logic');
        } else {
          repeaterItem.find('#field_1_1008').closest('.gfield_repeater_cell').css('display', 'block');
          repeaterItem.find('#field_1_1008').closest('.gfield').removeAttr('data-conditional-logic');
          repeaterItem.find('#field_1_1007').closest('.gfield_repeater_cell').css('display', 'none');
          repeaterItem.find('#field_1_1007').closest('.gfield').attr('data-conditional-logic', 'hidden');
        }
      });
    }

    function clearLineItemDataField() {
      const errorBox = $('#gform_1_validation_container');
      if (errorBox.length > 0) {
        $('textarea#input_1_8').val('');
      }
    }
  });
})(jQuery);
