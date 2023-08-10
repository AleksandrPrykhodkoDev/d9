/**
 * @file
 * Getting the server time via AJAX.
 */

(function ($, Drupal) {

  'use strict';

  /**
   * Replaces content of hello Ajax block with response from Ajax call.
   */
  Drupal.behaviors.usersRefresh = {
    attach: function () {
      function refresh() {
        $.ajax({
          url: Drupal.url('ajax-response'),
          type: 'POST',
          dataType: 'html',
          success: function (response) {
            // $('.block-users-logged-in-block .block__content').text(response.block);
          }
        });
      }
      setInterval(function () {
        refresh()
      }, 5000);
    }
  };
})(jQuery, Drupal);
