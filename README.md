# QR Code Generator

A multilingual web-based QR code generator built with PHP that supports Kazakh, English, Chinese, and Russian languages.

## Features

- 🌍 **Multilingual Support**: Available in Kazakh (ҚАЗ), English (ENG), Chinese (中文), and Russian (РУС)
- 🔗 **Versatile Input**: Generate QR codes for URLs, text, or any string
- 📱 **Responsive Design**: Works on desktop, tablet, and mobile devices
- 💾 **Download Support**: Download generated QR codes as SVG files
- ⚡ **Real-time Generation**: Instant QR code creation
- 🎨 **Clean UI**: Modern and intuitive user interface

## Requirements

- PHP 7.4 or higher
- Composer (PHP dependency manager)
- Web server (Apache, Nginx, or PHP built-in server)

## Installation

1. **Clone or download the project**
   ```bash
   git clone https://github.com/KadylBakyt/multilang-qr-code-generator.git
   cd multilang-qr-code-generator
   ```

2. **Install dependencies using Composer**
   ```bash
   composer install
   ```

3. **Start the development server**
   ```bash
   php -S localhost:8000
   ```

4. **Open your browser and visit**
   ```
   http://localhost:8000
   ```

## Dependencies

This project uses the following PHP libraries:

- **endroid/qr-code** (^6.0) - QR code generation library
- **bacon/bacon-qr-code** - QR code encoding (dependency of endroid/qr-code)
- **dasprid/enum** - Enumeration support (dependency)

## File Structure

```
qr_code_generator/
├── index.php          # Main application file
├── styles.css         # CSS styling
├── scripts.js         # JavaScript functionality
├── translations.php   # Language translations
├── composer.json      # PHP dependencies
├── vendor/           # Composer dependencies
└── README.md         # This file
```

## Usage

1. **Select Language**: Choose your preferred language using the language selector at the top
2. **Enter Content**: Type or paste any text, URL, or content you want to encode
3. **Generate**: Click the "Generate QR Code" button
4. **Download**: Use the download button to save the QR code as an SVG file
5. **Clear**: Use the clear button to reset the form

## Supported Languages

- **Kazakh (ҚАЗ)**: Default language
- **English (ENG)**: Full English translation
- **Chinese (中文)**: Simplified Chinese support
- **Russian (РУС)**: Complete Russian translation

## Configuration

### Adding New Languages

To add a new language, edit the `translations.php` file:

```php
$languages['your_lang_code'] = [
    'title' => 'Your Translation',
    'subtitle' => 'Your subtitle translation',
    // ... add all required keys
];
```

### Customizing Styles

Modify `styles.css` to change the appearance of the application.

### QR Code Settings

The QR code generation uses the Endroid QR Code library. You can customize QR code properties by modifying the relevant section in `index.php`:

```php
$qrCode = new QrCode($inputText);
// Add custom settings here
$writer = new SvgWriter();
```

## Browser Support

- Chrome 60+
- Firefox 55+
- Safari 12+
- Edge 79+

## Development

### Running Tests

Currently, no automated tests are included. To test functionality:

1. Test each language interface
2. Verify QR code generation with different input types
3. Test download functionality
4. Check responsive design on different screen sizes

### Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## Troubleshooting

### Common Issues

**QR Code not generating:**
- Check that PHP has proper write permissions
- Verify Composer dependencies are installed
- Ensure PHP version compatibility

**Missing translations:**
- Verify the language code exists in `translations.php`
- Check that all required translation keys are present

**CSS/JS not loading:**
- Confirm file paths are correct
- Check web server configuration

## License

This project is open source. Please check individual dependencies for their respective licenses.

## Credits

- [Endroid QR Code](https://github.com/endroid/qr-code) - QR code generation
- [Bacon QR Code](https://github.com/Bacon/BaconQrCode) - QR code encoding

## Support

For issues or questions, please create an issue in the project repository.
