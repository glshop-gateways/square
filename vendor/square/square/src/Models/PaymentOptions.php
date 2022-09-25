<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

class PaymentOptions implements \JsonSerializable
{
    /**
     * @var bool|null
     */
    private $autocomplete;

    /**
     * @var string|null
     */
    private $delayDuration;

    /**
     * @var bool|null
     */
    private $acceptPartialAuthorization;

    /**
     * Returns Autocomplete.
     * Indicates whether the `Payment` objects created from this `TerminalCheckout` are automatically
     * `COMPLETED` or left in an `APPROVED` state for later modification.
     */
    public function getAutocomplete(): ?bool
    {
        return $this->autocomplete;
    }

    /**
     * Sets Autocomplete.
     * Indicates whether the `Payment` objects created from this `TerminalCheckout` are automatically
     * `COMPLETED` or left in an `APPROVED` state for later modification.
     *
     * @maps autocomplete
     */
    public function setAutocomplete(?bool $autocomplete): void
    {
        $this->autocomplete = $autocomplete;
    }

    /**
     * Returns Delay Duration.
     * The duration of time after the payment's creation when Square automatically cancels the
     * payment. This automatic cancellation applies only to payments that do not reach a terminal state
     * (COMPLETED, CANCELED, or FAILED) before the `delay_duration` time period.
     *
     * This parameter should be specified as a time duration, in RFC 3339 format, with a minimum value
     * of 1 minute.
     *
     * Note: This feature is only supported for card payments. This parameter can only be set for a
     * delayed
     * capture payment (`autocomplete=false`).
     * Default:
     * - Card-present payments: "PT36H" (36 hours) from the creation time.
     * - Card-not-present payments: "P7D" (7 days) from the creation time.
     */
    public function getDelayDuration(): ?string
    {
        return $this->delayDuration;
    }

    /**
     * Sets Delay Duration.
     * The duration of time after the payment's creation when Square automatically cancels the
     * payment. This automatic cancellation applies only to payments that do not reach a terminal state
     * (COMPLETED, CANCELED, or FAILED) before the `delay_duration` time period.
     *
     * This parameter should be specified as a time duration, in RFC 3339 format, with a minimum value
     * of 1 minute.
     *
     * Note: This feature is only supported for card payments. This parameter can only be set for a
     * delayed
     * capture payment (`autocomplete=false`).
     * Default:
     * - Card-present payments: "PT36H" (36 hours) from the creation time.
     * - Card-not-present payments: "P7D" (7 days) from the creation time.
     *
     * @maps delay_duration
     */
    public function setDelayDuration(?string $delayDuration): void
    {
        $this->delayDuration = $delayDuration;
    }

    /**
     * Returns Accept Partial Authorization.
     * If set to `true` and charging a Square Gift Card, a payment might be returned with
     * `amount_money` equal to less than what was requested. For example, a request for $20 when charging
     * a Square Gift Card with a balance of $5 results in an APPROVED payment of $5. You might choose
     * to prompt the buyer for an additional payment to cover the remainder or cancel the Gift Card
     * payment.
     *
     * This field cannot be `true` when `autocomplete = true`.
     * This field cannot be `true` when an `order_id` isn't specified.
     *
     * For more information, see
     * [Take Partial Payments](https://developer.squareup.com/docs/payments-api/take-payments/card-
     * payments/partial-payments-with-gift-cards).
     *
     * Default: false
     */
    public function getAcceptPartialAuthorization(): ?bool
    {
        return $this->acceptPartialAuthorization;
    }

    /**
     * Sets Accept Partial Authorization.
     * If set to `true` and charging a Square Gift Card, a payment might be returned with
     * `amount_money` equal to less than what was requested. For example, a request for $20 when charging
     * a Square Gift Card with a balance of $5 results in an APPROVED payment of $5. You might choose
     * to prompt the buyer for an additional payment to cover the remainder or cancel the Gift Card
     * payment.
     *
     * This field cannot be `true` when `autocomplete = true`.
     * This field cannot be `true` when an `order_id` isn't specified.
     *
     * For more information, see
     * [Take Partial Payments](https://developer.squareup.com/docs/payments-api/take-payments/card-
     * payments/partial-payments-with-gift-cards).
     *
     * Default: false
     *
     * @maps accept_partial_authorization
     */
    public function setAcceptPartialAuthorization(?bool $acceptPartialAuthorization): void
    {
        $this->acceptPartialAuthorization = $acceptPartialAuthorization;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->autocomplete)) {
            $json['autocomplete']                 = $this->autocomplete;
        }
        if (isset($this->delayDuration)) {
            $json['delay_duration']               = $this->delayDuration;
        }
        if (isset($this->acceptPartialAuthorization)) {
            $json['accept_partial_authorization'] = $this->acceptPartialAuthorization;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
