# Square Payment Gateway

The “Checkout API” function provided by Square (https://squareup.com) is used to create a payment page similar to Paypal's. The buyer is redirected to Square to complete the transaction, and directed back to your site after completing the payment.

Only cart checkout is supported by this gateway.

## SquareUp Account
An account is required at https://squareup.com. Once you have an account created you can visit https://connect.squareup.com/apps and set up your application. There is fairly extensive documentation at https://docs.connect.squareup.com/.

  - Create your application and note the Application ID and Access Token
  - Create a webhook from the Webhooks menu.
  - Note that there are separate configurations for Sandbox and Production.
  - Click “Create Endpoint”
  - URL: `https://yoursite.com/shop/hooks/webhook.php?_gw=square`
  - You must use TLS (SSL) for your webhook.
  - Select all “payment” and “refund” events. Not all events are currently used, but may be in the future.
  - Select all “invoice” events if you're using the terms gateway.
  - Copy the Webhook Signatue string to be added to the Shop configuration.
  - Save the endpoint.

## Gateway Configuration
Configure the gateway in the Shop plugin administration area.

### Sandbox Location ID
Enter the ID of a sandbox location. There should be a few created automatically for you when you created your app.

### Sandbox App ID
Enter the Application ID the corresponds to the sandbox location.

### Sandbox Access Token
Enter the Personal Access Token that corresponds to the Sandbox App ID.

### Production Location ID
Enter the ID of your production location.

### Production App ID
Enter the Application ID the corresponds to the production location.

### Production Access Token
Enter the Personal Access Token that corresponds to the Production App ID.

### Testing (Sandbox) Mode?
Check this to use the sandbox to test your processes. Once you are ready to go live, uncheck this box.

### Enabled
Check to enable this gateway. If it is not enabled, no buy-now buttons will be shown for it and it cannot be used during checkout.

### Order
This indicates the order in which the gateway will appear on the checkout form, lower numbers appear first.
