# Gutenberg Block to Silverstripe Elemental Mapping

This document maps WordPress Gutenberg block patterns to equivalent Silverstripe Elemental elements
available in the Dynamic Essentials ecosystem.

## Available Elemental Packages

| Package | Element Class | Description |
|---------|--------------|-------------|
| `dynamic/silverstripe-elemental-accordion` | `ElementAccordion` | Collapsible panels for FAQs |
| `dynamic/silverstripe-elemental-blog` | `ElementBlogPosts`, `ElementBlogOverview` | Blog post grids |
| `dynamic/silverstripe-elemental-call-to-action` | `ElementCallToAction` | CTA sections with buttons |
| `dynamic/silverstripe-elemental-card` | `ElementCard` | Card components with images |
| `dynamic/silverstripe-elemental-carousel` | `ElementCarousel` | Image/video sliders |
| `dynamic/silverstripe-elemental-customer-service` | `ElementCustomerService` | Contact info blocks |
| `dynamic/silverstripe-elemental-embedded-code` | `ElementEmbeddedCode` | Custom HTML/JS embeds |
| `dynamic/silverstripe-elemental-gallery` | `ElementPhotoGallery` | Image galleries |
| `dynamic/silverstripe-elemental-image` | `ElementImage` | Single image w/ content |
| `dynamic/silverstripe-elemental-links` | `LinksElement` | Link lists |
| `dynamic/silverstripe-elemental-oembed` | `ElementOembed` | Video embeds (YouTube, Vimeo) |
| `dynamic/silverstripe-elemental-sponsors` | `ElementSponsor` | Logo grids |
| `dynamic/silverstripe-elemental-stat-counters` | `ElementStatCounters` | Animated numbers |
| `dynamic/silverstripe-elemental-testimonials` | `ElementTestimonials` | Client quotes |
| `dynamic/silverstripe-elemental-templates` | `Template` | Preset element layouts |
| `dynamic/silverstripe-essentials-tools` | `HeroMedia`, `ElementStaff`, `SimpleContent` | Hero, staff, content |
| `dnadesign/silverstripe-elemental` | `ElementContent` | WYSIWYG content blocks |
| `wedevelopnl/silverstripe-elemental-grid` | `ElementRow` | Bootstrap grid rows |
| `dnadesign/silverstripe-elemental-userforms` | `ElementForm` | Contact forms |

## Gutenberg Pattern → Elemental Mapping

### Hero/Banner Patterns
| Gutenberg Pattern | Elemental Equivalent | Notes |
|-------------------|---------------------|-------|
| Cover Block (dark) | `HeroMedia` | Full-width, image bg, centered text |
| Hero w/ CTA | `HeroMedia` + `ElementCallToAction` | Hero in fluid row, CTA in container |
| Large Header | `HeroMedia` | `TitleTag: h1`, `ContentAlign: Center` |

### Card/Column Patterns
| Gutenberg Pattern | Elemental Equivalent | Notes |
|-------------------|---------------------|-------|
| Columns (3-up) | 3× `ElementCard` w/ `SizeMD: 4` | Cards handle multi-col via Bootstrap |
| Feature Grid | 3× `ElementCard` w/ icons | Use `TopTitle` for category labels |
| Pricing Table | 3× `ElementCard` | `BackgroundColor` for featured tier |
| Team Grid | `ElementStaff` | Linked `StaffMember` records |
| Media & Text | `ElementContent` w/ `MediaImage` | Use `MediaPosition` for left/right |

### Text/Content Patterns
| Gutenberg Pattern | Elemental Equivalent | Notes |
|-------------------|---------------------|-------|
| Paragraph | `ElementContent` | Basic WYSIWYG |
| Quote/Pullquote | `ElementTestimonials` | Or styled `ElementContent` |
| List | `ElementContent` | HTML list in WYSIWYG |
| FAQ Accordion | `ElementAccordion` + panels | `OpenFirstPanel: true` |

### Media Patterns
| Gutenberg Pattern | Elemental Equivalent | Notes |
|-------------------|---------------------|-------|
| Gallery | `ElementPhotoGallery` | Grid of `GalleryImage` records |
| Image | `ElementImage` | Single image w/ caption |
| Video | `ElementOembed` | YouTube, Vimeo embeds |
| Carousel | `ElementCarousel` | `ImageSlide` or `VideoSlide` |

### CTA/Form Patterns
| Gutenberg Pattern | Elemental Equivalent | Notes |
|-------------------|---------------------|-------|
| Buttons | `ElementCallToAction` | Link field for button |
| Newsletter | `ElementCallToAction` | HTML form in content |
| Contact Form | `ElementForm` | UserForms integration |

### Specialty Patterns
| Gutenberg Pattern | Elemental Equivalent | Notes |
|-------------------|---------------------|-------|
| Logo Grid | `ElementSponsor` | `Sponsor` records with images |
| Stats/Numbers | `ElementStatCounters` | Animated counters |
| Social Links | `LinksElement` | External links list |
| Footer Columns | Multiple `ElementContent` | `SizeMD: 4/2/2/4` grid |
| Customer Service | `ElementCustomerService` | Address, phone, hours |

## Layout Key: Rows vs Elements

**ElementRow** controls container behavior:
- `IsFluid: true` = Edge-to-edge (hero sections)
- `IsFluid: false` + `ContainerStyle: container` = Centered max-width
- `BackgroundStyle` = Bootstrap bg classes (`bg-dark`, `bg-light`, `bg-primary`)
- `VerticalPadding` = Bootstrap padding (`py-5`, `py-6`)

**Element `SizeMD`** controls column width (Bootstrap grid):
- `12` = Full width
- `6` = Half width (2-column)
- `4` = One-third (3-column)
- `3` = One-quarter (4-column)

## Current Templates

| Template Name | Elements Used |
|--------------|---------------|
| Dark Hero Banner | `ElementRow` (fluid) + `HeroMedia` |
| Team Members Grid (4 Column) | `ElementRow` + `ElementStaff` |
| Pricing Tiers (3 Column) | `ElementRow` + 3× `ElementCard` |
| Feature Grid (3 Column) | `ElementRow` + 3× `ElementCard` |
| Newsletter Signup | `ElementRow` (fluid) + `ElementCallToAction` |
| Footer Columns | `ElementRow` + 4× `ElementContent` |
| Portfolio Grid | `ElementRow` + `ElementPhotoGallery` |
| Client Logos | `ElementRow` + `ElementSponsor` |

## Gutenberg Blocks Without Elemental Equivalents

The following Gutenberg patterns **cannot** be directly recreated with current Essentials elements:

| Gutenberg Block | Description | Potential Silverstripe Element |
|----------------|-------------|-------------------------------|
| **Table** | Data tables with sortable columns | `ElementTable` (new) |
| **Countdown Timer** | Event countdown | `ElementCountdown` (new) |
| **Progress Bar** | Visual progress indicators | `ElementProgress` (new) |
| **Tabs** | Tabbed content panels | `ElementTabs` (new) |
| **Timeline** | Vertical event timeline | `ElementTimeline` (new) |
| **Map** | Google/OpenStreetMap embeds | `ElementMap` (new) |
| **Pricing Toggle** | Monthly/yearly toggle pricing | Could extend `ElementCard` |
| **Before/After Slider** | Image comparison slider | `ElementComparisonSlider` (new) |
| **Social Feed** | Instagram/Twitter embeds | `ElementSocialFeed` (new) |
| **Team Popup/Modal** | Team member detail modals | Styling enhancement to `ElementStaff` |

### Workarounds Using Existing Elements

| Pattern | Workaround |
|---------|-----------|
| Table | Use `ElementContent` with HTML table |
| Map | Use `ElementEmbeddedCode` with iframe |
| Tabs | Use `ElementAccordion` as alternative |
| Social Feed | Use `ElementOembed` for individual posts |

### Recommended New Elements

Priority additions to consider for the Essentials recipe:

1. **`ElementTable`** - Common need for product specs, comparison charts
2. **`ElementTabs`** - Popular pattern for organizing content
3. **`ElementMap`** - Contact pages, location-based content
4. **`ElementTimeline`** - Company history, project milestones
