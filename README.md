# Recipe Silverstripe Essentials Fixtures

A Silverstripe recipe that provides demo fixtures and images for Essentials websites.

## License

See [License](LICENSE)

## Installation

```bash
composer require dynamic/recipe-silverstripe-essentials-fixtures
```

## Usage

After installation, run the populate task to load demo content:

```bash
vendor/bin/sake dev/tasks/PopulateTask
```

## Contents

This recipe includes:

- **Element Template Library** - Pre-built element templates for common page layouts
- **Site Demo Content** - Sample pages, elements, and content for demonstration
- **Images** - Placeholder images for heroes, galleries, staff, testimonials, and more

## Configuration

The fixtures populate configuration is automatically installed to `app/_config/fixtures-populate.yml`. You can customize which fixtures are loaded by modifying this file.
