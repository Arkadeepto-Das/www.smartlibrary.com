<?php
  /**
   * Check the format of user input data.
   * 
   *   @method emailValidation()
   *     This function checks the format of the Email-ID.
   *   @method passwordValidation()
   *     This function checks the format of the password.
   *   @method imageValidation()
   *     This function check the image file size and type.
   *   @method sendOTP()
   *     This function sends the OTP to the Email-ID.
   */
  class Validation {
    /**
     * This function checks Email-ID of the user.
     * 
     *   @param string $email
     *     Stores the Email-ID.
     * 
     *   @return bool
     *     Returns TRUE if Email-ID is valid otherwise FALSE.
     */
    public function emailValidation(string $email) {
      // Email validation.
      return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * This function checks the password of the user.
     * 
     *   @param string $password
     *     Stores the password.
     * 
     *   @return bool
     *     Returns TRUE if the password is valid otherwise FALSE.
     */
    public function passwordValidation(string $password) {
      // Password format validation.
      if(preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=!\?]{8,20}$/",
      $password) == 1) {
        return TRUE;
      }
      return FALSE;
    }
  }
?>
