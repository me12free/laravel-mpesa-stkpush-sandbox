# Laravel M-Pesa STK Push Sandbox

[![Tests](https://github.com/me12free/laravel-mpesa-stkpush-sandbox/actions/workflows/tests.yml/badge.svg)](https://github.com/me12free/laravel-mpesa-stkpush-sandbox/actions)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)
[![Buy Me a Coffee](https://img.shields.io/badge/Buy%20Me%20a%20Coffee-Support%20the%20Author-orange?logo=buy-me-a-coffee&logoColor=white)](https://coff.ee/johnekiru7v)
[![GitHub stars](https://img.shields.io/github/stars/me12free/laravel-mpesa-stkpush-sandbox?style=social)](https://github.com/me12free/laravel-mpesa-stkpush-sandbox/stargazers)

A modern, open-source Laravel package for integrating M-Pesa STK Push (sandbox/testing) with best practices. Focused on developer experience, security, and easy integration.

---

## Table of Contents
- [Requirements](#requirements)
- [Quick Start](#quick-start)
- [Configuration](#configuration)
- [Usage Example](#usage-example)
- [Callback Handling](#callback-handling)
- [Testing](#testing)
- [Contributing & Feedback](#contributing--feedback)
- [Support](#support)
- [Author](#author)
- [License](#license)

---

## Requirements
- PHP >= 8.0
- Laravel >= 9.0

---

## Quick Start

```bash
composer require me12free/laravel-mpesa-stkpush-sandbox
```

### Publish Config & Migration

```bash
php artisan vendor:publish --provider="MpesaSandbox\MpesaSandboxServiceProvider" --tag=config
php artisan vendor:publish --provider="MpesaSandbox\MpesaSandboxServiceProvider" --tag=migrations
```

---

## Configuration

Add to your `.env`:
```env
MPESA_CONSUMER_KEY=your_sandbox_consumer_key
MPESA_CONSUMER_SECRET=your_sandbox_consumer_secret
MPESA_SHORTCODE=174379
MPESA_PASSKEY=your_sandbox_passkey
MPESA_CALLBACK_URL=https://your-ngrok-url/api/mpesa/callback?secret=your_shared_secret
MPESA_CALLBACK_SECRET=your_shared_secret
```

---

## Usage Example

```php
use MpesaSandbox\MpesaSandbox;

$mpesa = app(MpesaSandbox::class);
$response = $mpesa->initiateStkPush('2547XXXXXXXX', 10);
```

---

## Callback Handling

See [`README-callback.md`](README-callback.md) for a full example controller and route.

**Security:** Always verify the shared secret in your callback controller:

```php
if ($request->query('secret') !== env('MPESA_CALLBACK_SECRET')) {
    abort(403, 'Invalid secret');
}
```

---

## Testing

This package uses [Pest](https://pestphp.com/) and [Orchestra Testbench](https://github.com/orchestral/testbench) for isolated, modern package testing.

```bash
composer install
vendor/bin/pest
```

---

## Contributing & Feedback

Pull requests are welcome! Please see the [CONTRIBUTING.md](CONTRIBUTING.md) guide (or open an issue for questions).

- **Star this repo:** If you like this package, please [star it on GitHub](https://github.com/me12free/laravel-mpesa-stkpush-sandbox/stargazers) to show your support!
- **Rate on Packagist:** [Leave a rating or review on Packagist](https://packagist.org/packages/me12free/laravel-mpesa-stkpush-sandbox) if you find it useful.
- **Become a contributor:** Open a pull request or issue to join the contributors list. See [CONTRIBUTING.md](CONTRIBUTING.md) for full guidelines.

---

## Support
If you find this package useful, consider supporting development:

[![Buy Me a Coffee](https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png)](https://coff.ee/johnekiru7v)

For help or questions, open an issue or email [johnewoi72@gmail.com](mailto:johnewoi72@gmail.com).

---

## Author

John Ekiru (<johnewoi72@gmail.com>)

## License

MIT — see [LICENSE](LICENSE)
