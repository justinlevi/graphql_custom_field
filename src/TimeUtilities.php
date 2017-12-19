<?php

namespace Drupal\custom_graphql_field;


class TimeUtilities {

  /**
   * Returns the current time
   *
   * @return string
   *   The current time
   */
  static function now(){
    return date('Y-m-d H:ia');
  }
}