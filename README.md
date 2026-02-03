# Recipe Silverstripe Essentials Fixtures

A Silverstripe recipe that provides demo fixtures and images for Essentials websites.

## License

See [License](LICENSE)

## Installation

```bash
composer require --dev dynamic/recipe-silverstripe-essentials-fixtures
```

## Usage

After installation, run the populate task to load demo content:

```bash
vendor/bin/sake dev/tasks/PopulateTask
```

## Contents

This recipe includes:

- **Site Demo Content** - Sample pages, elements, and content for demonstration
- **Element Template Library** - Pre-built element templates for common page layouts
- **Element Template Expanded** - Gutenberg-inspired templates with advanced styling
- **Template Preview Images** - Screenshots for template previews in the CMS
- **Images** - Placeholder images for heroes, galleries, staff, testimonials, and more

## Configuration

The fixtures populate configuration is automatically installed via `app/_config/fixtures-populate.yml`. 

To customize which fixtures are loaded, create an override in your project's `app/_config/` with `After: essentials-fixtures-populate-config`.
