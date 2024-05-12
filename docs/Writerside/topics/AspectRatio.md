# Aspect Ratio

Displays content within a desired ratio.

## Installation

To install the Aspect Ratio component, use the following command:

```bash
php bin/console fusion-ui:add aspect-ratio
```

This will add the Aspect Ratio component to your project.

## Usage

To use the Aspect Ratio component in your project, include the following code in your TWIG file:

```Twig
<twig:ui:aspect-ratio:root ratio="16/9" class="rounded-md overflow-hidden border shadow-sm">
    <img src="{{ asset('images/unsplash.jpg') }}" alt="Placeholder" loading="lazy" />
</twig:ui:aspect-ratio:root>
```