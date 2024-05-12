# Avatar

An image element with a fallback for representing the user.

## Installation

To install the Avatar component, use the following command:

```bash
php bin/console fusion-ui:add avatar
```

This will add the Avatar component to your project.

## Usage

To use the Avatar component in your project, include the following code in your TWIG file:

```Twig
<twig:ui:avatar:root>
    <twig:ui:avatar:image src="https://github.com/shadcn.png" alt="@shadcn"/>
    <twig:ui:avatar:fallback>CN</twig:ui:avatar:fallback>
</twig:ui:avatar:root>
```