# CLI

This document provides instructions on how to use the Command Line Interface (CLI) for your project.
The CLI is a powerful tool that allows you to initialize configuration,
add components, and manage dependencies for your project.

## init

The `init` command is used to set up the initial configuration and dependencies for a new project.
It configures the `tailwind.config.cjs` file and creates CSS variables for the project.

To use the `init` command, type the following into your terminal:

```bash
php bin/console fusion-ui:init
```

## add

The `add` command allows you to add new components and dependencies to your project.
This is useful when you want to extend the functionality of your project.

To use the `add` command, type the following into your terminal,
replacing `[component]` with the name of the component you wish to add:

```bash
php bin/console fusion-ui:add [component]
```

Remember to replace `[component]` with the actual name of the component you want to add.