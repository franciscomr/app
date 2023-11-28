<?php

namespace App\Rules\Auth;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Auth;

class ThrottleRule implements ValidationRule
{
  protected $throttleKey;
  public function __construct($throttleKey)
  {
    $this->throttleKey = $throttleKey;
  }

  /**
   * Run the validation rule.
   *
   * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
   */

  public function validate(string $attribute, mixed $value, Closure $fail): void
  {

    if (RateLimiter::remaining($this->throttleKey, 3) > 0) {
    } else {
      $seconds = RateLimiter::availableIn($this->throttleKey);
      $fail('You may try again in ' . $seconds . ' seconds.');
    }


    /*
    $tooManyAttempts = RateLimiter::attempt('usernmae|233333', $perMinute = 3, function () {
      // Send message...
    });

    if ($tooManyAttempts) {
      $fail('auth.throttle')->translate();
    }
    */
  }
}
