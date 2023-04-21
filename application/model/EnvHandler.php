<?php
  namespace application\model;
  
  use Dotenv\Dotenv;
  /**
   * This class gives an array containing the credentials of the database.
   * 
   *   @method fetchEnvValues()
   *     This function is used to access the credentials from the .env file.
   */
  class EnvHandler {

    /**
     * This function is used to access the credentials from the .env file.
     * 
     *   @return array
     *     Returns an array of the credentials in the .env file.
     */
    public function fetchEnvValues() {
      $env = Dotenv::createImmutable(__DIR__);
      $env->load();
      return $_ENV;
    }
  }
?>
