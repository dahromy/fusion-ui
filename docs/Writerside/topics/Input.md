# Input

Displays a form input field or a component that looks like an input field.

## Installation

To install the Input component, use the following command:

```bash
php bin/console fusion-ui:add input
```

This will add the Input component to your project.

## Usage

To use the Input component in your project, include the following code in your TWIG file:

```Twig
<twig:ui:input:default type="email" id="email" placeholder="Email" />
```

```Twig
<twig:ui:input:textarea id="message" placeholder="Enter your message here..." />
```