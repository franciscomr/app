<?php

namespace App\Rules\Auth;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class ThrottleRule implements ValidationRule
{
  private const THROTTLEKEY = "LOGIN_REQUEST";
  private const MAXATTEMPS = 2;
  private const DECAYINSECONDS = 30;

  public function validate(string $attribute, mixed $value, Closure $fail): void
  {
    if (RateLimiter::tooManyAttempts($this->throttleKey(), $this->getMaxAttemps())) {
      $fail('auth.throttle')->translate([
        'seconds' => $this->throttleTimeRemaining(),
      ]);
    }
  }


  private static function throttleKey()
  {
    return ThrottleRule::THROTTLEKEY . '|' . app(Request::class)->ip();
  }

  protected function getMaxAttemps()
  {
    return ThrottleRule::MAXATTEMPS;
  }

  protected function getdecayInSeconds()
  {
    return ThrottleRule::DECAYINSECONDS;
  }

  protected function hasTooManyAttempts()
  {
    return RateLimiter::tooManyAttempts(
      $this->throttleKey(),
      $this->getMaxAttemps()
    );
  }

  public static function clearRateLimiter()
  {
    RateLimiter::clear(ThrottleRule::throttleKey());
  }

  public static function incrementAttempts()
  {
    RateLimiter::hit(ThrottleRule::throttleKey(), ThrottleRule::DECAYINSECONDS);
  }

  public static function numberOfAttempsLeft()
  {
    return RateLimiter::remaining(ThrottleRule::throttleKey(), ThrottleRule::MAXATTEMPS);
  }

  protected function throttleTimeRemaining()
  {
    return RateLimiter::availableIn(ThrottleRule::throttleKey());
  }
}
