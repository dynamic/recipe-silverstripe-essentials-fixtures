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

**This recipe does not install configuration automatically.** You must add `fixtures-populate.yml` to your project's `app/_config/` directory.

### Example Configuration

Create `app/_config/fixtures-populate.yml` in your project:

```yaml
---
Name: project-fixtures-populate
Only:
  environment: 'dev'
---
DNADesign\Populate\Populate:
  include_yaml_fixtures:
    - 'vendor/dynamic/recipe-silverstripe-essentials-fixtures/app/fixtures/site-demo-content.yml'
    - 'vendor/dynamic/recipe-silverstripe-essentials-fixtures/app/fixtures/template-preview-images.yml'
    - 'vendor/dynamic/recipe-silverstripe-essentials-fixtures/app/fixtures/element-templates.yml'
  
  # No truncation - all records use FixtureIdentifier for safe merge matching
  truncate_objects: []
  truncate_tables: []

---
Name: project-fixtures-extensions
Only:
  environment: 'dev'
---
# Apply FixtureRecordExtension to fixture-managed classes
# This adds FixtureIdentifier field for PopulateMergeMatch to prevent duplicates

SilverStripe\CMS\Model\SiteTree:
  create_default_pages: false
  extensions:
    - Dynamic\EssentialsFixtures\FixtureRecordExtension

SilverStripe\Assets\File:
  extensions:
    - Dynamic\EssentialsFixtures\FixtureRecordExtension

DNADesign\Elemental\Models\BaseElement:
  extensions:
    - Dynamic\EssentialsFixtures\FixtureRecordExtension

# Add additional classes as needed for your fixture content
```

See the `essentials-demo-installer` project for a comprehensive configuration example.
